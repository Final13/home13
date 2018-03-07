<?php

namespace App\Http\Requests;

use App\Rules\ExistSpaceRule;
use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'email' => 'required|string|email|max:255',
//            'email' => [
//                'required',
//                'email',
//                Rule::unique('users', 'email')->ignore(request()->user()->id),
//            ],
            'birthday' => ['required', 'date', 'before:18 years ago'],
        ];
    }

    public function messages()
    {
        return [
            'birthday.before' => 'You must be 18 years old',
        ];
    }
}
