<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        // 実装時にtrue
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
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|max:255',
            'tel' => 'max:20',
            'role' => 'integer|max:2'
        ];
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
}
