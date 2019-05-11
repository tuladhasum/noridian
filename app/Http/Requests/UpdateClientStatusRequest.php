<?php

namespace App\Http\Requests;

use App\ClientStatus;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('client_status_edit');
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
