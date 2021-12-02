<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class ProfileRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:tbl_user,email,'. auth()->id(),
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama Lengkap',
        ];
    }
}
