<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIncomeSourceRequest;
use App\Http\Requests\StoreIncomeSourceRequest;
use App\Http\Requests\UpdateIncomeSourceRequest;
use App\IncomeSource;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class IncomeSourceController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('income_source_access'), 403);

        $incomeSources = IncomeSource::all();

        return view('admin.incomeSources.index', compact('incomeSources'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('income_source_create'), 403);

        return view('admin.incomeSources.create');
    }

    public function store(StoreIncomeSourceRequest $request)
    {
        abort_unless(\Gate::allows('income_source_create'), 403);

        $incomeSource = IncomeSource::create($request->all());

        return redirect()->route('admin.income-sources.index');
    }

    public function edit(IncomeSource $incomeSource)
    {
        abort_unless(\Gate::allows('income_source_edit'), 403);

        return view('admin.incomeSources.edit', compact('incomeSource'));
    }

    public function update(UpdateIncomeSourceRequest $request, IncomeSource $incomeSource)
    {
        abort_unless(\Gate::allows('income_source_edit'), 403);

        $incomeSource->update($request->all());

        return redirect()->route('admin.income-sources.index');
    }

    public function show(IncomeSource $incomeSource)
    {
        abort_unless(\Gate::allows('income_source_show'), 403);

        return view('admin.incomeSources.show', compact('incomeSource'));
    }

    public function destroy(IncomeSource $incomeSource)
    {
        abort_unless(\Gate::allows('income_source_delete'), 403);

        $incomeSource->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncomeSourceRequest $request)
    {
        IncomeSource::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
