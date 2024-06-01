<?php

namespace Admin\Http\Requests\Project;

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
            'name'                  => 'required|string|min:2|max:191',
            'location'              => 'required|string|min:4',
            'project_category_id'   => 'required|exists:project_categories,id',
            'is_featured'           => 'boolean|nullable',
            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5500',

        ];
    }
}
