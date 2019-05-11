<?php

namespace App\Http\Requests;

use App\Project;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_edit');
    }

    public function rules()
    {
        return [
            'name'       => [
                'required',
            ],
            'client_id'  => [
                'required',
                'integer',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
