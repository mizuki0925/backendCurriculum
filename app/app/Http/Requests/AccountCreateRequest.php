<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // 実装時にtrue
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:accounts,email',
            'tel'   => 'nullable|regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
            'password' => 'required|min:4',
            'role' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'tel' => '電話番号',
            'password' => 'パスワード',
            'role' => '権限',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeを入力してください',
            'name.string' => ':attributeを正しく入力してください',
            'name.max' => ':attributeは20文字以内で入力してください',
            'email.required' => ':attributeを入力してください',
            'email.email' => ':attributeを正しく入力してください',
            'email.unique' => 'この:attributeは既に存在します',
            'tel.required' => ':attributeを入力してください',
            'tel.regex' => ':attributeを正しく入力してください',
            'password.required' => ':attributeを入力してください',
            'password.min' => ':attributeは4文字以上入力してください',
            'role.required' => ':attributeを選択してください',
        ];
    }
}
