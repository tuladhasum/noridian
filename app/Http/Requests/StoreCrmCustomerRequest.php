<?php

namespace App\Http\Requests;

use App\CrmCustomer;
use Illuminate\Foundation\Http\FormRequest;

class StoreCrmCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('crm_customer_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'required',
            ],
            'status_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}
