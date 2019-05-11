<?php

namespace App\Http\Requests;

use App\Currency;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('currency_edit');
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
