<?php

namespace App\Http\Requests;

use App\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProjectRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('project_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:projects,id',
        ];
    }
}
