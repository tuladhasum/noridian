<?php

namespace App\Http\Requests;

use App\IncomeSource;
use Illuminate\Foundation\Http\FormRequest;

class StoreIncomeSourceRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('income_source_create');
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
