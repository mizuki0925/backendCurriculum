<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealestateCreateRequest extends FormRequest
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
            'address' => 'required|string|max:20',
            'breadth' => 'required|integer',
            'floor_plan' => 'required|max:10',
            'tenancy_status' => 'required',
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
            'user_id' => '物件登録者',
            'created_at' => '作成日時',
            'updated_at' => '更新日時'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attributeを入力してください',
            'name.max' => ':attributeは20文字以内で入力してください',
            'address.required' => ':attributeを入力してください',
            'address.max' => ':attributeは20文字以内で入力してください',
            'breadth.required' => ':attributeを入力してください',
            'breadth.integer' => ':attributeを正しく入力してください',
            'floor_plan.required' => ':attributeを入力してください',
            'floor_plan.max' => ':attributeは10文字以内で入力してください',
            'tenancy_status.integer' => ':attributeを正しく入力してください',
        ];
    }
}
