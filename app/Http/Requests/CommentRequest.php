<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'bail|required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => '内容は必須です。',
            'comment.max' => '100文字以内で入力してください。',
        ];
    }
}
