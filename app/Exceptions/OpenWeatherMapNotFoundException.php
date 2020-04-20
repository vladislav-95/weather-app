<?php

namespace App\Exceptions;

use Exception;

class OpenWeatherMapNotFoundException extends Exception
{
    /**
     * Render an exception into an HTTP response.
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function render()
    {
        return response()->json(['message' => 'Weather Not Found!'], 404);
    }
}
