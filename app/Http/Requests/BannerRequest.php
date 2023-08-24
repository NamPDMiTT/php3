<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                    case 'addBanner':
                        $rules = [
                            'name' => 'required|max:255',
                            'image' => 'required',
                            'description' => 'required|max:255'
                        ];
                        break;

                    case 'editBanner':
                        $rules = [
                            'name' => 'required|max:255',
                            'description' => 'required|max:255'
                        ];
                        break;

                    default:
                        break;
                }
                break;
        }
        return $rules;
    }

    public function messages() {
        return [
            'name.required' => 'Please enter banner name!',
            'name.max' => 'Banner name must be less than 255 characters!',
            'image.required' => 'Please choose banner image!',
            'description.required' => 'Please enter banner description!',
            'description.max' => 'Banner description must be less than 255 characters!'
        ];
    }
}
