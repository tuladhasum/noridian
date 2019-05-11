<?php

namespace App\Http\Requests;

use App\CrmStatus;
use Illuminate\Foundation\Http\FormRequest;

class StoreCrmStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('crm_status_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
