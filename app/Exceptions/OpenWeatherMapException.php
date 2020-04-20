<?php

namespace App\Exceptions;

use Exception;

class OpenWeatherMapException extends Exception
{
    /**
     * Render an exception into an HTTP response.
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function render()
    {
        return response()->json($this->getMessage(), 500);
    }
}
