<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * 認可
     */
    public function authorize(): bool
    {
        // 認可のロジックをここに記述することができます。
        return true;
    }

    /**
     * バリデーションルール
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ロワンヴー]*$/u'],
            'phone' => ['nullable', 'regex:/^0(\d-?\d{4}|\d{2}-?\d{3}|\d{3}-?\d{2}|\d{4}-?\d|\d0-?\d{4})-?\d{4}$/'],
            'email' => ['required', 'email'],
            'body' => ['required', 'string', 'max:2000'],
        ];
    }

    /**
     * 属性名
     *
     * @return array<string, string>
     */
    public function attributes()
    {
        return [
            'name' => 'お名前',
            'name_kana' => 'お名前（カナ）',
            'body' => 'お問い合わせ内容',
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'phone.regex' => ':attributeには、正しい形式で入力してください。',
        ];
    }
}
