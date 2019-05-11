<?php

namespace App\Http\Requests;

use App\ClientStatus;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientStatusRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('client_status_create');
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
