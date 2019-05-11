<?php

namespace App\Http\Requests;

use App\Project;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_create');
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
