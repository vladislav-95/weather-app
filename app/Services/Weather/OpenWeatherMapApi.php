<?php

namespace App\Services\Weather;

use App\Exceptions\OpenWeatherMapException;
use App\Exceptions\OpenWeatherMapNotFoundException;
use App\Services\Weather\Models\CurrentWeather;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class OpenWeatherMapApi
{
    /**
     * @var string Basic api url.
     */
    private $apiUrl;

    /**
     * @var string Url to get weather data.
     */
    private $weatherUrl;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * OpenWeatherMapApi constructor.
     * @throws OpenWeatherMapException
     */
    public function __construct()
    {
        $this->apiUrl = config('weatherapi.open_weather_map.api_url');
        $this->apiKey = config('weatherapi.open_weather_map.api_key');

        if (!$this->apiKey || !$this->apiUrl) {
            throw new OpenWeatherMapException('open_weather_map config not set');
        }

        $this->weatherUrl = $this->apiUrl . 'weather?';
    }

    /**
     * @param string $cityName
     * @param string $lang
     * @param string $units
     *
     * @return CurrentWeather
     * @throws
     */
    public function getCurrentWeather(string $cityName, string $lang = 'en', string $units = 'metric')
    {
        $data = $this->makeRequest($this->weatherUrl, $cityName, $lang, $units);
        return new CurrentWeather($data, $units);
    }

    /**
     * Makes request to openWeatherMap
     *
     * @param string $url
     * @param string $query
     * @param string $lang
     * @param string $units
     * @return array
     * @throws OpenWeatherMapNotFoundException
     * @throws OpenWeatherMapException
     */
    protected function makeRequest(string $url, string $query, string $lang = 'en', string $units = 'metric') {
        $requestUrl = $url . 'q=' . $query . '&lang=' . $lang . '&units=' . $units . '&appid=' . $this->apiKey;

        /** @var Response $response */
        $response = Http::get($requestUrl);

        if ($response->status() !== 200) {
            if ($response->status() === 404) {
                throw new OpenWeatherMapNotFoundException();
            }

            throw new OpenWeatherMapException($response->body());
        }

        return $response->json();
    }
}
