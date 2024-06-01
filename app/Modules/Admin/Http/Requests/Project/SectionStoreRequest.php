<?php

namespace Admin\Http\Requests\Project;

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
            'project_id'        => 'required|exists:projects,id',
            'section_type_id'   => 'required|exists:project_section_types,id',
            'attachment[]'      => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2000000000000000000000000',
            'text[]'            => 'nullable|string|min:4',


        ];
    }
}
