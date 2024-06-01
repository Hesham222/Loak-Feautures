<?php

namespace Admin\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'          => 'required|string|min:2|max:191',
            'is_featured'   =>'boolean|nullable',
            'image'         => 'required|mimes:jpeg,png,jpg,gif,svg|max:5500',
//           'image'         => 'required|mimetypes:image/jpeg,png,jpg,gif,svg,video/mp4|max:2000000',

        ];
    }
}
