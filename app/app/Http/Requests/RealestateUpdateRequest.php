<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealestateUpdateRequest extends FormRequest
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
            'address' => 'nullable|string|max:20',
            'breadth' => 'nullable|integer',
            'floor_plan' => 'nullable|max:10',
            'tenancy_status' => 'nullable',
            'user_id' => 'integer'
        ];
    }

    public function attributes()
    {
        return [
            'name' => '物件名',
            'address' => '住所',
            'breadth' => '広さ',
            'floor_plan' => '間取り',
            'tenancy_status' => '入居状況',
            'user_id' => '物件登録者'
        ];
    }

    public function messages()
    {
        return [
            'name.max' => ':attributeは20文字以内で入力してください',
            'address.max' => ':attributeは20文字以内で入力してください',
            'breadth.integer' => ':attributeを正しく入力してください',
            'floor_plan.max' => ':attributeは10文字以内で入力してください',
        ];
    }
}
