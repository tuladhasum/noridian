<?php

namespace App\Http\Requests;

use App\CrmNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyCrmNoteRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('crm_note_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:crm_notes,id',
        ];
    }
}
