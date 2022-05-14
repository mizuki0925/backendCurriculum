<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Account;

class AccountRequest extends FormRequest
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
        if ($this->has('delete')) {
            return [];
        } else {
            return [
                'name' => 'required|max:255',
                'password' => 'required|max:255',
                'email' => [
                    'required',
                    'max:255',
                    Rule::unique('accounts')->ignore($this->id)
                ],
                'tel' => 'max:20',
                'role' => 'integer|max:2'
            ];
        }
    }

    public function attributes()
    {
        return [
            'name' => '名前',
            'password' => 'パスワード',
            'email' => 'メールアドレス',
            'tel' => '電話番号',
            'role' => '権限'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeを入力してください',
            'name.max' => ':attributeは255文字以内で入力してください',
            'password.required' => ':attributeを入力してください',
            'password.max' => ':attributeは255文字以内で入力してください',
            'email.required' => ':attributeを入力してください',
            'email.max' => ':attributeは255文字以内で入力してください',
            'email.unique' => ':attributeは既に使われています',
            'tel.max' => ':attributeを正しく入力してください',
            'role.required' => ':attributeを入力してください',
            'role.integer' => ':attributeを選択してください',
        ];
    }
}
