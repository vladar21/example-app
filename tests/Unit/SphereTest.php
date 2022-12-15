<?php

namespace Tests\Unit;

use App\Models\Point;
use App\Models\Sphere;
use PHPUnit\Framework\TestCase;

class SphereTest extends TestCase
{
    private $sphere;
    private $place;
    private $cities;
    private $delta;

    public function setup(): void
    {
        $this->sphere = new Sphere();
        $this->place = new Point([
            'latitude' => 51.5072,
            'longitude' => -0.1275
        ]);
        $this->delta = 2;
        $this->cities = [
            [
                'name' => 'Birmingham',
                'point' => new Point([
                    'latitude' => 52.4800,
                    'longitude' => -1.9025
                ]),
                'distanceToLondon' => 163
            ],
            [
                'name' => 'Liverpool',
                'point' => new Point([
                    'latitude' => 53.4000,
                    'longitude' => -2.9833
                ]),
                'distanceToLondon' => 287
            ],
            [
                'name' => 'Nottingham',
                'point' => new Point([
                    'latitude' => 52.9500,
                    'longitude' => -1.1500
                ]),
                'distanceToLondon' => 175
            ],
            [
                'name' => 'Sheffield',
                'point' => new Point([
                    'latitude' => 53.3833,
                    'longitude' => -1.4667
                ]),
                'distanceToLondon' => 228
            ],
            [
                'name' => 'Bristol',
                'point' => new Point([
                    'latitude' => 51.4500,
                    'longitude' => -2.5833
                ]),
                'distanceToLondon' => 172
            ],
            [
                'name' => 'Glasgow',
                'point' => new Point([
                    'latitude' => 55.8609,
                    'longitude' => -4.2514
                ]),
                'distanceToLondon' => 556
            ]
        ];

    }

    public function tearDown(): void
    {

    }

    /**
     * A unit test checks correct work for the Sphere distance method.
     *
     * @return void
     */
    public function testSphereDistance()
    {
        echo 'The limit of the delta for the distance between cities is '.$this->delta . ' km.'. PHP_EOL;
        echo 'List of delta distances from London:' . PHP_EOL;
        foreach($this->cities as $city){
            $val1 = $city['distanceToLondon'];
            $val2 = $this->sphere->distance($this->place, $city['point']);
            $result = round($val1 - $val2, 3);
            echo ' to ' .$city['name'] . ' is ' . ($result ?? -$result) . ' km'. PHP_EOL;
            $this->assertEqualsWithDelta($val1, $val2, $this->delta, 'the delta for the distance from London to ' .$city['name'] . ' is ' . ($val1 >= $val2 ? $val1 - $val2 : $val2 - $val1));
        }

    }
}
