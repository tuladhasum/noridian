<?php

namespace App\Http\Requests;

use App\CrmDocument;
use Illuminate\Foundation\Http\FormRequest;

class StoreCrmDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('crm_document_create');
    }

    public function rules()
    {
        return [
            'customer_id'   => [
                'required',
                'integer',
            ],
            'document_file' => [
                'required',
            ],
        ];
    }
}
