<?php

namespace Admin\Http\Requests\Photo;

use Illuminate\Foundation\Http\FormRequest;

class SectionStoreRequest extends FormRequest
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
            'name'              => 'required|string|min:2|max:191',
            'order'             => 'required|numeric',
            'photo_id'          => 'required|exists:photos,id',
            'section_type_id'   => 'required|exists:photo_section_types,id',
            'attachment[]'      => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5500',
            'text[]'            => 'nullable|string|min:4',


        ];
    }
}
