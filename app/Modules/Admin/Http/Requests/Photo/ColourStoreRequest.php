<?php

namespace Admin\Http\Requests\Photo;

use Illuminate\Foundation\Http\FormRequest;

class ColourStoreRequest extends FormRequest
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
            'record_id'           => 'required|exists:photos,id',
            'colour'              => 'nullable|string',



        ];
    }
}
