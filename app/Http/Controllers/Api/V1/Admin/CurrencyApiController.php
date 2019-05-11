<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;

class CurrencyApiController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();

        return $currencies;
    }

    public function store(StoreCurrencyRequest $request)
    {
        return Currency::create($request->all());
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        return $currency->update($request->all());
    }

    public function show(Currency $currency)
    {
        return $currency;
    }

    public function destroy(Currency $currency)
    {
        return $currency->delete();
    }
}
