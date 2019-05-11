<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeSourceRequest;
use App\Http\Requests\UpdateIncomeSourceRequest;
use App\IncomeSource;

class IncomeSourceApiController extends Controller
{
    public function index()
    {
        $incomeSources = IncomeSource::all();

        return $incomeSources;
    }

    public function store(StoreIncomeSourceRequest $request)
    {
        return IncomeSource::create($request->all());
    }

    public function update(UpdateIncomeSourceRequest $request, IncomeSource $incomeSource)
    {
        return $incomeSource->update($request->all());
    }

    public function show(IncomeSource $incomeSource)
    {
        return $incomeSource;
    }

    public function destroy(IncomeSource $incomeSource)
    {
        return $incomeSource->delete();
    }
}
