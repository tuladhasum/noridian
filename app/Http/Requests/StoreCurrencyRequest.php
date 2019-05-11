<?php

namespace App\Http\Requests;

use App\Currency;
use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('currency_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'code' => [
                'required',
            ],
        ];
    }
}
