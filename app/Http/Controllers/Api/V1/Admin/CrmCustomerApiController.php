<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CrmCustomer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCrmCustomerRequest;
use App\Http\Requests\UpdateCrmCustomerRequest;

class CrmCustomerApiController extends Controller
{
    public function index()
    {
        $crmCustomers = CrmCustomer::all();

        return $crmCustomers;
    }

    public function store(StoreCrmCustomerRequest $request)
    {
        return CrmCustomer::create($request->all());
    }

    public function update(UpdateCrmCustomerRequest $request, CrmCustomer $crmCustomer)
    {
        return $crmCustomer->update($request->all());
    }

    public function show(CrmCustomer $crmCustomer)
    {
        return $crmCustomer;
    }

    public function destroy(CrmCustomer $crmCustomer)
    {
        return $crmCustomer->delete();
    }
}
