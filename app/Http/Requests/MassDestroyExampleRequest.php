<?php

namespace App\Http\Requests;

use App\Example;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyExampleRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('example_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:examples,id',
        ];
    }
}
