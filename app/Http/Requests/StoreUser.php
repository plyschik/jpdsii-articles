<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'         => 'required|email|unique:users',
            'first_name'    => 'required|string|min:2|max:32',
            'last_name'     => 'required|string|min:2|max:32',
            'password'      => 'required|string|min:6|confirmed',
            'role_id'       => 'required|exists:roles,id'
        ];
    }
}
