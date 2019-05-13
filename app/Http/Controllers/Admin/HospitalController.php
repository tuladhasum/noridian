<?php

namespace App\Http\Controllers\Admin;

use App\Hospital;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHospitalRequest;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HospitalController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('hospital_access'), 403);

        $hospitals = Hospital::all();

        return view('admin.hospitals.index', compact('hospitals'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('hospital_create'), 403);

        return view('admin.hospitals.create');
    }

    public function store(StoreHospitalRequest $request)
    {
        abort_unless(\Gate::allows('hospital_create'), 403);

        $hospital = Hospital::create($request->all());

        return redirect()->route('admin.hospitals.index');
    }

    public function edit(Hospital $hospital)
    {
        abort_unless(\Gate::allows('hospital_edit'), 403);

        return view('admin.hospitals.edit', compact('hospital'));
    }

    public function update(UpdateHospitalRequest $request, Hospital $hospital)
    {
        abort_unless(\Gate::allows('hospital_edit'), 403);

        $hospital->update($request->all());

        return redirect()->route('admin.hospitals.index');
    }

    public function show(Hospital $hospital)
    {
        abort_unless(\Gate::allows('hospital_show'), 403);

        return view('admin.hospitals.show', compact('hospital'));
    }

    public function destroy(Hospital $hospital)
    {
        abort_unless(\Gate::allows('hospital_delete'), 403);

        $hospital->delete();

        return back();
    }

    public function massDestroy(MassDestroyHospitalRequest $request)
    {
        Hospital::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
