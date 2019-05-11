<?php

namespace App\Http\Requests;

use App\TransactionType;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionTypeRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('transaction_type_create');
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
