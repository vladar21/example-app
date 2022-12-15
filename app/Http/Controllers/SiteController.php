<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        $place = [
            'latitude' => 53.3340285,
            'longitude' => -6.2535495
        ];

        $distance = 100;

        $list = $this->getMeeting($place, $distance, $affiliates);


    }

    /**
     * Get a list of affiliates located at a given distance from the meeting point.
     *
     * @param  array  $place - the place of meeting
     * @param int $distance - the radius of invited
     * @param array $affiliates - the list of affiliates
     * @return array - filtered list of affiliates
     */
    private function getMeeting($place, $distance, $affiliates){

    }
}
