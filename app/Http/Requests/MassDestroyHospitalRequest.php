<?php

namespace App\Http\Requests;

use App\Hospital;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyHospitalRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('hospital_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hospitals,id',
        ];
    }
}
