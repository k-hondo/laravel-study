<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\Gender;

class StoreCatRequest extends FormRequest
{
    /**
     * 認可
     */
    public function authorize(): bool
    {
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
            'name' => ['required', 'max:255'],
            'breed' => ['required', 'max:255'],
            'gender'   => ['required', new Enum(Gender::class)],
            'date_of_birth' => ['required', 'date'],
            'image' => [
                'required',
                'file', // ファイルがアップロードされている
                'image', // 画像ファイルである
                'max:2000', // ファイル容量が2000kb以下である
                'mimes:jpeg,jpg,png', // 形式はjpegかpng
                'dimensions:min_width=300,min_height=300,max_width=1200,max_height=1200', // 画像の解像度が300px * 300px ~ 1200px * 1200px
            ],
            'introduction' => ['required', 'max:20000'],
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
            'breed' => '種類',
            'introduction' => '紹介文',
        ];
    }
}
