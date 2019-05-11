<?php

namespace App\Http\Requests;

use App\CrmDocument;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCrmDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('crm_document_edit');
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
