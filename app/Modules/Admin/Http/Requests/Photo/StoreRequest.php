<?php

namespace Admin\Http\Requests\Photo;

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
            'photo_category_id'     => 'required|exists:photo_categories,id',
            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5500',

        ];
    }
}
