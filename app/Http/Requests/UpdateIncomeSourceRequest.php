<?php

namespace App\Http\Requests;

use App\IncomeSource;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIncomeSourceRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('income_source_edit');
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
