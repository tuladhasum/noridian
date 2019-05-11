<?php

namespace App\Http\Requests;

use App\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('transaction_create');
    }

    public function rules()
    {
        return [
            'project_id'          => [
                'required',
                'integer',
            ],
            'transaction_type_id' => [
                'required',
                'integer',
            ],
            'income_source_id'    => [
                'required',
                'integer',
            ],
            'amount'              => [
                'required',
            ],
            'currency_id'         => [
                'required',
                'integer',
            ],
            'transaction_date'    => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
