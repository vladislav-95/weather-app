<?php

namespace App\Services\Weather\Models;


class Temperature
{
    /** @var int $temp temperature */
    public $temp;

    /** @var int $max maximum temperature */
    public $max;

    /** @var int $min minimum temperature */
    public $min;

    /** @var string $unit */
    public $unit;

    /**
     * Temperature constructor.
     * @param int $temp
     * @param int $max
     * @param int $min
     * @param string $unit
     */
    public function __construct(int $temp, int $max, int $min, string $unit = 'metric')
    {
        $this->temp = $temp;
        $this->max = $max;
        $this->min = $min;
        $this->unit = $unit;
    }

    /**
     * Temperature unit
     *
     * @return string
     */
    public function getUnit()
    {
        return $this->unit === 'metric' ? '°C' : '°F';
    }

    /**
     * Returns the properties in the array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'temp' => $this->temp,
            'max' => $this->max,
            'min' => $this->min,
            'unit' => $this->getUnit()
        ];
    }
}
