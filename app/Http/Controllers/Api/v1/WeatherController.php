<?php

namespace App\Http\Controllers\Api\v1;

use App\City;
use App\Services\Weather\OpenWeatherMapApi;

class WeatherController extends ApiController
{
    /**
     * @param City $city
     * @return \Illuminate\Http\JsonResponse
     * @throws
     */
    public function getWeatherByCity(City $city)
    {
        $openWeatherMapApi = new OpenWeatherMapApi();
        $result = $openWeatherMapApi->getCurrentWeather($city->name)->temperature->toArray();

        return $this->respond($result);
    }
}
