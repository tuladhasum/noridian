<?php

namespace App\Http\Requests;

use App\Hospital;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHospitalRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('hospital_edit');
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
