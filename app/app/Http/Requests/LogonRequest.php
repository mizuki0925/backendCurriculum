<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogonRequest extends FormRequest
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
            'password' => 'required|max:255',
            'email' => 'required|max:255'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'パスワード',
            'email' => 'メールアドレス'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => ':attributeを入力してください',
            'password.max' => ':attributeは255文字以内で入力してください',
            'email.required' => ':attributeを入力してください',
            'email.max' => ':attributeは255文字以内で入力してください'
        ];
    }
}
