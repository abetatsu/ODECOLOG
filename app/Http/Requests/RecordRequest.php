<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
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
            'size' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'size.required' => 'サイズの選択は必須です。',
            'image.required' => '画像の投稿は必須です。',
        ];
    }
}
