<?php

namespace App\Services\Weather\Models;

class CurrentWeather
{
    /** @var Temperature  */
    public $temperature;

    /**
     * CurrentWeather constructor.
     *
     * @param mixed  $data
     * @param string $units
     */
    public function __construct($data, $units)
    {
        $this->temperature = new Temperature($data['main']['temp'], $data['main']['temp_max'], $data['main']['temp_min'], $units);
    }
}
