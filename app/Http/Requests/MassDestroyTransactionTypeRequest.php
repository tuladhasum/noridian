<?php

namespace App\Http\Requests;

use App\TransactionType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTransactionTypeRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('transaction_type_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:transaction_types,id',
        ];
    }
}
