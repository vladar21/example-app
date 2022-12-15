<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Point extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'latitude',
        'longitude'
    ];
    /**
     * @var float
     */
    private $longitude;
    /**
     * @var float
     */
    private $latitude;

    /**
     * Set the latitude.
     *
     * @param float $value
     * @return void
     */
    public function setLatitude(float $value)
    {
        $this->latitude = $value;
    }

    /**
     * Get the latitude.
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Set the longitude.
     *
     * @param float $value
     * @return void
     */
    public function setlongitude(float $value)
    {
        $this->longitude = $value;
    }

    /**
     * Get the longitude.
     *
     * @return float
     */
    public function getlongitude(): float
    {
        return $this->longitude;
    }


}
