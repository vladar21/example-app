<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Point;
use App\Models\Sphere;


class SiteController extends Controller
{
    public function index()
    {
        $pathStorage = storage_path('/app/public/affiliates.txt');

        $file = fopen($pathStorage, "r");
        $affiliates = [];
        while(!feof($file)) {
            $line = fgets($file);
            $json = json_decode($line);
            $affiliates[] = $json;
        }
        fclose($file);

        $place = new Point([
            'latitude' => 53.3340285,
            'longitude' => -6.2535495
        ]);

        $distance = 100;

        $list = $this->getMeeting($place, $distance, $affiliates);

        usort($list, function($a, $b) {
            return $a['affiliate_id'] > $b['affiliate_id'];
        });

        return view('data', compact('list'));

    }

    /**
     * Get a list of affiliates located at a given distance from the meeting point.
     *
     * @param  Point  $place - the place of meeting
     * @param int $distance - the radius of invited
     * @param array $affiliates - the list of affiliates
     * @return array - filtered list of affiliates
     */
    private function getMeeting($place, $distance, $affiliates){
        $result = [];
        $sphere = new Sphere;
        foreach ($affiliates as $affiliate){
            $point2 = new Point([
                'latitude' => $affiliate->latitude,
                'longitude' => $affiliate->longitude
            ]);
            $currentDistance = $sphere->distance($place, $point2);
            if ($currentDistance < $distance){
                $res['affiliate_id'] = $affiliate->affiliate_id;
                $res['name'] = $affiliate->name;
                $res['distance'] = $currentDistance;
                $result[] = $res;
            }
        }
        return $result;
    }



}
