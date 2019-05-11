<?php

namespace App\Http\Requests;

use App\CrmStatus;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCrmStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('crm_status_edit');
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
