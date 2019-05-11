<?php

namespace App\Http\Controllers\Admin;

use App\CrmStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCrmStatusRequest;
use App\Http\Requests\StoreCrmStatusRequest;
use App\Http\Requests\UpdateCrmStatusRequest;

class CrmStatusController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('crm_status_access'), 403);

        $crmStatuses = CrmStatus::all();

        return view('admin.crmStatuses.index', compact('crmStatuses'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('crm_status_create'), 403);

        return view('admin.crmStatuses.create');
    }

    public function store(StoreCrmStatusRequest $request)
    {
        abort_unless(\Gate::allows('crm_status_create'), 403);

        $crmStatus = CrmStatus::create($request->all());

        return redirect()->route('admin.crm-statuses.index');
    }

    public function edit(CrmStatus $crmStatus)
    {
        abort_unless(\Gate::allows('crm_status_edit'), 403);

        return view('admin.crmStatuses.edit', compact('crmStatus'));
    }

    public function update(UpdateCrmStatusRequest $request, CrmStatus $crmStatus)
    {
        abort_unless(\Gate::allows('crm_status_edit'), 403);

        $crmStatus->update($request->all());

        return redirect()->route('admin.crm-statuses.index');
    }

    public function show(CrmStatus $crmStatus)
    {
        abort_unless(\Gate::allows('crm_status_show'), 403);

        return view('admin.crmStatuses.show', compact('crmStatus'));
    }

    public function destroy(CrmStatus $crmStatus)
    {
        abort_unless(\Gate::allows('crm_status_delete'), 403);

        $crmStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmStatusRequest $request)
    {
        CrmStatus::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
