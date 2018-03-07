<?php

namespace App\Http\Requests;

use App\Rules\ExistSpaceRule;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255', new ExistSpaceRule],
            'last_name' => ['required', 'string', 'max:255', new ExistSpaceRule],
            'email' => 'required|string|email|max:255|unique:users',
            'birthday' => ['required', 'date', 'before:18 years ago'],
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'birthday.before' => 'You must be 18 years old',
        ];
    }
}
