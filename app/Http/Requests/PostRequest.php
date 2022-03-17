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
            'title' => 'required | max:100', //タイトルは100文字以内に制限
            'combo_content' => 'required',
            'advise' => 'required',
            'twitter_url' => 'required',
            'damage' => 'required',
            //'when_season' => 'nullable',
            'char' => 'required'
        ];
    }
}
