<?php

namespace App\Http\Requests;

use App\ClientStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyClientStatusRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('client_status_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:client_statuses,id',
        ];
    }
}
