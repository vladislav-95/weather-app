<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\CreateCityRequest;
use App\Http\Requests\Api\UpdateCityRequest;
use Illuminate\Http\Request;
use App\City;

class CityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = (int) $request->get('limit', 20);
        $offset = (int) $request->get('offset', 0);

        $result =  City::offset($offset)->limit($limit)->get();

        return $this->respond($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCityRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateCityRequest $request)
    {
        $data = $request->validated();
        $city = City::create($data);

        return $this->respondCreated($city);
    }

    /**
     * Display the specified resource.
     *
     * @param  City $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(City $city)
    {
        return $this->respond($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCityRequest  $request
     * @param  City $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $data = $request->validated();
        $city->update($data);

        return $this->respondNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  City $city
     * @return \Illuminate\Http\JsonResponse
     * @throws
     */
    public function destroy(City $city)
    {
        $city->delete();

        return $this->respondNoContent();
    }
}
