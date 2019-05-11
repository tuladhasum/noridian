<?php

namespace App\Http\Controllers\Admin;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCurrencyRequest;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CurrencyController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('currency_access'), 403);

        $currencies = Currency::all();

        return view('admin.currencies.index', compact('currencies'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('currency_create'), 403);

        return view('admin.currencies.create');
    }

    public function store(StoreCurrencyRequest $request)
    {
        abort_unless(\Gate::allows('currency_create'), 403);

        $currency = Currency::create($request->all());

        return redirect()->route('admin.currencies.index');
    }

    public function edit(Currency $currency)
    {
        abort_unless(\Gate::allows('currency_edit'), 403);

        return view('admin.currencies.edit', compact('currency'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        abort_unless(\Gate::allows('currency_edit'), 403);

        $currency->update($request->all());

        return redirect()->route('admin.currencies.index');
    }

    public function show(Currency $currency)
    {
        abort_unless(\Gate::allows('currency_show'), 403);

        return view('admin.currencies.show', compact('currency'));
    }

    public function destroy(Currency $currency)
    {
        abort_unless(\Gate::allows('currency_delete'), 403);

        $currency->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrencyRequest $request)
    {
        Currency::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
