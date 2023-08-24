<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
                    case 'addStudent':
                        $rules = [
                            'name' => 'required|max:50',
                            'gender' => 'required',
                            'phone' => 'required|numeric|digits:10|unique:students,phone',
                            'address' => 'required|max:255',
                            'image' => 'required'
                        ];
                        break;

                    case 'editStudent':
                        $rules = [
                            'name' => 'required|max:50',
                            'gender' => 'required',
                            'phone' => 'required|numeric|digits:10|unique:students,phone,' . $this->id,
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
            'name.required' => 'Please enter name!',
            'name.max' => 'Name must not be more than 50 characters!',
            'gender.required' => 'Please enter gender!',
            'phone.required' => 'Please enter phone!',
            'phone.numeric' => 'Phone must be a number!',
            'phone.digits' => 'Phone must be 10 digits!',
            'phone.unique' => 'Phone already exists!',
            'address.required' => 'Please enter address!',
            'address.max' => 'Address must not be more than 255 characters!',
            'image.required' => 'Please choose image!'
        ];
    }
}
