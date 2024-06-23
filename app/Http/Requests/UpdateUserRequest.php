<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix_name' => 'nullable|string|max:255',
            'birthday' => 'required|date',
            'gender_id' => 'required|exists:genders,gender_id',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:users,email,' . $this->route('id') . ',user_id',
            'username' => 'required|string|max:255|unique:users,username,' . $this->route('id') . ',user_id',
            'role_id' => 'required|exists:roles,role_id',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'birthday.required' => 'Birthday is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email has already been taken',
            'username.required' => 'Username is required',
            'username.unique' => 'Username has already been taken',
            'gender_id.required' => 'Gender is required',
            'role_id.required' => 'Role is required',
            'address.required' => 'Address is required',
            'contact_number.required' => 'Contact number is required',
        ];
    }
}
