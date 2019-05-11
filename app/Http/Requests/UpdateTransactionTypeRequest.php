<?php

namespace App\Http\Requests;

use App\TransactionType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionTypeRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('transaction_type_edit');
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
