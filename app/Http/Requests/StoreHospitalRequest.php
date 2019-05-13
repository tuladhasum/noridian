<?php

namespace App\Http\Requests;

use App\Hospital;
use Illuminate\Foundation\Http\FormRequest;

class StoreHospitalRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('hospital_create');
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
