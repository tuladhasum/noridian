<?php

namespace App\Http\Requests;

use App\Note;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('note_edit');
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
