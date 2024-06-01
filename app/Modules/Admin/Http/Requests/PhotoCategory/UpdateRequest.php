<?php

namespace Admin\Http\Requests\PhotoCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $id = $this->route('photoCategory');
        return [
            'name'          => 'required|string|min:4|max:191',
            'is_featured'   => 'boolean|nullable',
            'image'         => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5500',

        ];
    }
}
