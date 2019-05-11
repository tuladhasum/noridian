<?php

namespace App\Http\Requests;

use App\Note;
use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('note_create');
    }

    public function rules()
    {
        return [
            'project_id' => [
                'required',
                'integer',
            ],
            'note_text'  => [
                'required',
            ],
        ];
    }
}
