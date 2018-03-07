<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTalkProposal extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'bio' => 'required|max:512',
            'avatar' => 'file|image|size:5120|dimensions:max_width=1000,max_height=1000,ratio=1/1',
            'title' => 'required|max:64',
            'abstract' => 'required|max:2048',
            'availability' => '',
            'notes' => '',
        ];
    }
}
