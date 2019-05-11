<?php

namespace App\Http\Requests;

use App\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyClientRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('client_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:clients,id',
        ];
    }
}
