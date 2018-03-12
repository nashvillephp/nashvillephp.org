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
            'avatar' => 'file|image|max:1024|dimensions:max_width=1000,max_height=1000,ratio=1/1',
            'title' => 'required|max:64',
            'abstract' => 'required|max:2048',
            'availability' => '',
            'notes' => '',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Your name is required. You may use an alias, if you prefer.',
            'email.required' => 'An email address is required so we can contact you.',
            'email.email' => 'You must provide a valid email address so we can contact you.',
            'bio.required' => 'Our group wants to know about the presenter, so please tell us a little about yourself '
                . 'that we can post alongside your talk title and abstract. If this is a concern, enter "n/a," and we '
                . 'will be happy to discuss alternatives.',
            'bio.max' => 'You biography should be short and sweet. Please keep it under :max characters.',
            'avatar.image' => 'Your photo must be an image file.',
            'avatar.max' => 'Your photo must be less than 1 MB.',
            'avatar.dimensions' => 'Your photo must have an aspect ratio of 1:1 and be no more than 1000x1000 pixels.',
            'title.required' => 'No talk proposal is complete without a title!',
            'title.max' => 'Keep your title short and sweet. Anything longer than :max characters is too long.',
            'abstract.required' => 'No talk proposal is complete without an abstract!',
            'abstract.max' => 'Writing a good abstract is a balancing act between providing enough detail to grab the '
                . 'reader’s attention and too much detail. We think :max characters is more than enough to find this '
                . 'balance. Let us know if you need help.',
        ];
    }
}
