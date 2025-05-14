<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'gender' => 'required|in:男性,女性,その他',
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel' => ['required', 'numeric', 'digits_between:10,11'],
            'address' => ['required', 'string', 'max:255'],
            'build' => ['nullable', 'string', 'max:255'],
            'content_type' => ['required', 'string'],
            'content' => ['required', 'string', 'min:10', 'max:120'],

        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'last_name.string' => '姓は文字列で入力してください',
            'last_name.max' => '姓は255文字以内で入力してください',
            'first_name.required' => '名を入力してください',
            'first_name.string' => '名は文字列で入力してください',
            'first_name.max' => '名は255文字以内で入力してください',
            'gender.required' => '性別を選択してください',
            'gender.in' => '性別の値が不正です',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスは文字列で入力してください',
            'email.email' => '有効なメールアドレスを入力してください',
            'email.max' => 'メールアドレスは255文字以内で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.numeric' => '電話番号は数字で入力してください',
            'tel.digits_between' => '電話番号は10〜11桁で入力してください',
            'address.required' => '住所を入力してください',
            'address.string' => '住所は文字列で入力してください',
            'address.max' => '住所は255文字以内で入力してください',
            'build.string' => '建物名は文字列で入力してください',
            'build.max' => '建物名は255文字以内で入力してください',
            'content_type.required' => 'お問い合わせの種類を選択してください',
            'content.required' => 'お問い合わせ内容を入力してください',
            'content.string' => 'お問い合わせ内容は文字列で入力してください',
            'content.min' => 'お問い合わせ内容は10文字以上で入力してください',
            'content.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
