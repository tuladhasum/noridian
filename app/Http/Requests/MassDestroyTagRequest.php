<?php

namespace App\Http\Requests;

use App\Tag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTagRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('tag_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tags,id',
        ];
    }
}
