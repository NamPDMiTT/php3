<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                    case 'addPost':
                        $rules = [
                            'title' => 'required|max:255',
                            'image' => 'required',
                            'content' => 'required',
                            'status' => 'required'
                        ];
                        break;

                    case 'editPost':
                        $rules = [
                            'title' => 'required|max:255',
                            'image' => 'required',
                            'content' => 'required',
                            'status' => 'required'
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
            'title.required' => 'Please enter title!',
            'title.max' => 'Title must not be more than 255 characters!',
            'image.require' => 'Please enter image!',
            'content.require' => 'Please enter content!',
            'status.require' => 'Please choose status!'
        ];
    }
}
