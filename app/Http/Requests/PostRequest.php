<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'bail|required|max:30',
            'content' => 'required|max:1000',
            'image' => 'bail|mimes:jpeg,jpg,png,gif|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'title.max' => 'タイトルは30文字以内で記入してください。',
            'content.required' => '内容は必須です。',
            'content.max' => '内容は1000文字以内で入力してください。',
            'image.mimes' => 'ファイルタイプをjpeg,jpg,png,gifに設定してください。',
            'image.max' => 'ファイルサイズを10MB以下に設定してください。',
        ];
    }
}
