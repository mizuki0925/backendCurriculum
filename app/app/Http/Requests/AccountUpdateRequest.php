<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountUpdateRequest extends FormRequest
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
            'name' => 'nullable|string|max:20',
            'email' => [
                'nullable',
                'email',
                //unique制約から除外
                Rule::unique('accounts')->ignore($this->accountId),
            ],
            'tel'   => 'nullable|regex:/^[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}$/',
            'role' => 'nullable',
            'password' => 'nullable|min:4',

        ];
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'tel' => '電話番号',
            'role' => '権限',
            'password' => 'パスワード',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => ':attributeを正しく入力してください',
            'name.max' => ':attributeは20文字以内で入力してください',
            'email.email' => ':attributeを正しく入力してください',
            'email.unique' => 'この:attributeは既に存在します',
            'tel.regex' => ':attributeを正しく入力してください',
            'password.min' => ':attributeは4文字以上入力してください',
        ];
    }
}
