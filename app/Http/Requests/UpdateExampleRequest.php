<?php

namespace App\Http\Requests;

use App\Example;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExampleRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('example_edit');
    }

    public function rules()
    {
        return [
            'secret'          => [
                'required',
            ],
            'meal_preference' => [
                'required',
            ],
            'terms_agreement' => [
                'required',
            ],
            'expected_salary' => [
                'required',
            ],
            'date_of_birth'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'discharge_date'  => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'time_of_birth'   => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'tags.*'          => [
                'integer',
            ],
            'tags'            => [
                'array',
            ],
        ];
    }
}
