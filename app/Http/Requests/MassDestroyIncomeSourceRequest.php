<?php

namespace App\Http\Requests;

use App\IncomeSource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyIncomeSourceRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('income_source_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:income_sources,id',
        ];
    }
}
