<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'price' => 'required|integer|max:10000',
            'seasons' => 'required',
            'image' => 'required|image',
            'description' => 'required|max:120'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.integer' =>'数値で入力してください',
            'price.max' => '0~10000円以内で入力してください',
            'seasons.required' => '季節を選択してください',
            'image.required' => '商品画像を登録してください',
            'image.image' => '「.png」または「.jpeg」形式でアップロードしてください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください',
        ];
    }
}
