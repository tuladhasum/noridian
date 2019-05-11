<?php

namespace App\Http\Requests;

use App\Document;
use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('document_create');
    }

    public function rules()
    {
        return [
            'project_id'    => [
                'required',
                'integer',
            ],
            'document_file' => [
                'required',
            ],
        ];
    }
}
