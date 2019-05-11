<?php

namespace App\Http\Controllers\Admin;

use App\CrmCustomer;
use App\CrmStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCrmCustomerRequest;
use App\Http\Requests\StoreCrmCustomerRequest;
use App\Http\Requests\UpdateCrmCustomerRequest;

class CrmCustomerController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('crm_customer_access'), 403);

        $crmCustomers = CrmCustomer::all();

        return view('admin.crmCustomers.index', compact('crmCustomers'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('crm_customer_create'), 403);

        $statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmCustomers.create', compact('statuses'));
    }

    public function store(StoreCrmCustomerRequest $request)
    {
        abort_unless(\Gate::allows('crm_customer_create'), 403);

        $crmCustomer = CrmCustomer::create($request->all());

        return redirect()->route('admin.crm-customers.index');
    }

    public function edit(CrmCustomer $crmCustomer)
    {
        abort_unless(\Gate::allows('crm_customer_edit'), 403);

        $statuses = CrmStatus::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmCustomer->load('status');

        return view('admin.crmCustomers.edit', compact('statuses', 'crmCustomer'));
    }

    public function update(UpdateCrmCustomerRequest $request, CrmCustomer $crmCustomer)
    {
        abort_unless(\Gate::allows('crm_customer_edit'), 403);

        $crmCustomer->update($request->all());

        return redirect()->route('admin.crm-customers.index');
    }

    public function show(CrmCustomer $crmCustomer)
    {
        abort_unless(\Gate::allows('crm_customer_show'), 403);

        $crmCustomer->load('status');

        return view('admin.crmCustomers.show', compact('crmCustomer'));
    }

    public function destroy(CrmCustomer $crmCustomer)
    {
        abort_unless(\Gate::allows('crm_customer_delete'), 403);

        $crmCustomer->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmCustomerRequest $request)
    {
        CrmCustomer::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
