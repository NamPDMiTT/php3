<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
                    case 'addProject':
                        $rules = [
                            'project_name' => 'required|max:255',
                            'image' => 'required',
                            'owner' => 'required|max:255',
                            'room' => 'required|numeric',
                            'price' => 'required|integer',
                            'acreage' => 'required|integer',
                            'address' => 'required|max:255',
                            'detail' => 'required'
                        ];
                        break;

                    case 'editProject':
                        $rules = [
                            'project_name' => 'required|max:255',
                            'image' => 'required',
                            'owner' => 'required|max:255',
                            'room' => 'required|numeric',
                            'price' => 'required|integer',
                            'acreage' => 'required|integer',
                            'address' => 'required|max:255',
                            'detail' => 'required'
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
            'project_name.required' => 'Please enter project name!',
            'project_name.max' => 'Project name must not be more than 255 characters!',
            'image.required'  => 'Please choose image!',
            'owner.required' => 'Please enter owner!',
            'owner.max' => 'Owner must not be more than 255 characters!',
            'room.required' => 'Please enter room count!',
            'room.numeric' => 'Room count must be number!',
            'price.required' => 'Please enter price!',
            'price.numeric' => 'Price must be number!',
            'acreage.required' => 'Please enter acreage!',
            'acreage.integer' => 'Acreage must be number!',
            'address.required' => 'Please enter address!',
            'address.max' => 'Address must not be more than 255 characters!',
            'detail.required' => 'Please enter detail!'
        ];
    }
}
