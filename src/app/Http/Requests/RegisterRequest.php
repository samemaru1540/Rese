<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'email' => 'required|email|string|max191|Rule::unique('users')->ignore($this->id)',
            'password' => 'required|min:8|max191'
        ];
    }

    public function messages()
    {
        return [
        'name.required' => '名前を入力してください',
        'email.required' => 'メールアドレスを入力してください',
        'email.email' => 'メール形式で入力してください',
        'email.Rule::unique('users')->ignore($this->id)' => 'すでに同じメールアドレスが登録されています',
        'password.required' => 'パスワードを入力してください',
        'password.min:8' => '8文字以上で入力してください',
        ];
    }
}
