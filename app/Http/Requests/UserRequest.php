<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($currentAction) {
                    case 'addUser':
                        $rules = [
                            'fullname' => 'required|max:255',
                            'username' => 'required|unique:users,username|max:255',
                            'email' => 'required|email|unique:users,email',
                            'password' => 'required|min:6',
                            'gender' => 'required',
                            'phone' => 'required|numeric|digits_between:10,11',
                            'address' => 'required|max:255',
                            'role_id' => 'required'
                        ];
                        break;

                    case 'editUser':
                        $rules = [
                            'fullname' => 'required|max:255',
                            'gender' => 'required',
                            'phone' => 'required|numeric|digits_between:10,11',
                            'address' => 'required|max:255',
                            'role_id' => 'required'
                        ];
                        break;

                    case 'login': 
                        $rules = [
                            'email' => 'required',
                            'password' => 'required'
                        ];
                        break;

                    case 'register':
                        $rules = [
                            'fullname' => 'required',
                            'username' => 'required|unique:users,username|max:255',
                            'email' => 'required|unique:users,email|email',
                            'password' => 'required',
                            'password_confirmation' => 'required|same:password',
                            'gender' => 'required',
                            'phone' => 'required|numeric|digits_between:10,11',
                            'address' => 'required|max:255',
                        ];
                        break;

                    default:
                        break;
                }
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'fullname.required' => 'Please enter your fullname!',
            'fullname.max' => 'Fullname must not be more than 255 characters!',
            'username.required' => 'Please enter your username!',
            'username.unique' => 'Username has been existed!',
            'username.max' => 'Username must not be more than 255 characters!',
            'email.required' => 'Please enter your email!',
            'email.email' => 'Email is incorrect format!',
            'email.unique' => 'Email has been existed!',
            'password.required' => 'Please enter your password!',
            'password_confirmation.same' => 'Password confirm is incorrect!',
            'gender.required' => 'Please choose your gender!',
            'phone.required' => 'Please enter your phone!',
            'phone.numeric' => 'Phone must be number!',
            'phone.digits_between' => 'Phone is incorrect format!',
            'address.required' => 'Please enter your address!',
            'address.max' => 'Address must not be more than 255 characters!',
            'role_id.required' => 'Please choose your role!',
        ];
    }
}
