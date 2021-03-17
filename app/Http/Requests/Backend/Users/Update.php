<?php

namespace App\Http\Requests\Backend\Users;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'image' => 'image|mimes:png,jpg',
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user,
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }
}
