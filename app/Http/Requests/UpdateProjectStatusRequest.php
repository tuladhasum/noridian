<?php

namespace App\Http\Requests;

use App\ProjectStatus;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_status_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
