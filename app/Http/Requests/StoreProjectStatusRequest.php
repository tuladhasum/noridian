<?php

namespace App\Http\Requests;

use App\ProjectStatus;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('project_status_create');
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
