<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Point;

class Sphere extends Model
{
    use HasFactory;

    /**
     * Get the distance between 2 locations. This distance calculation uses the Spherical
     * Law of Cosines, which uses trigonometry to measure the curvature of the earth, to
     * accurately measure the distances on the Earth.
     *
     * @param Point $point1 - the coordinates of first point
     * @param Point $point2 - the coordinates of second point
     * @return int - the distance
     */
    function distance($point1, $point2) {
        $lat1 = $point1->latitude;
        $lon1 = $point1->longitude;
        $lat2 = $point2->latitude;
        $lon2 = $point2->longitude;
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $kilometers = $dist * 60 * 1.1515 * 1.609344;

            return $kilometers;

        }
    }

}
