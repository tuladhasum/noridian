<?php

namespace App\Http\Requests;

use App\CrmStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyCrmStatusRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('crm_status_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:crm_statuses,id',
        ];
    }
}
