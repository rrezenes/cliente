<?php

namespace cliente\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'unique:users|required|max:255',
            'password' => 'required|max:255',
            'active' => 'boolean'
        ];
    }

    public function response(array $errors) {

        return Response::create($errors, 403);
    }

}
