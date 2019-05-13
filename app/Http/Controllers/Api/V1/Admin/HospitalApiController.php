<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Hospital;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;

class HospitalApiController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();

        return $hospitals;
    }

    public function store(StoreHospitalRequest $request)
    {
        return Hospital::create($request->all());
    }

    public function update(UpdateHospitalRequest $request, Hospital $hospital)
    {
        return $hospital->update($request->all());
    }

    public function show(Hospital $hospital)
    {
        return $hospital;
    }

    public function destroy(Hospital $hospital)
    {
        return $hospital->delete();
    }
}
