<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Example;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExampleRequest;
use App\Http\Requests\UpdateExampleRequest;

class ExampleApiController extends Controller
{
    public function index()
    {
        $examples = Example::all();

        return $examples;
    }

    public function store(StoreExampleRequest $request)
    {
        return Example::create($request->all());
    }

    public function update(UpdateExampleRequest $request, Example $example)
    {
        return $example->update($request->all());
    }

    public function show(Example $example)
    {
        return $example;
    }

    public function destroy(Example $example)
    {
        return $example->delete();
    }
}
