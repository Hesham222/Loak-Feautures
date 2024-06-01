<?php

namespace Admin\Http\Requests\Award;

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
        $id = $this->route('slider');
        return [
            'name'          => 'required|string|min:4|max:191',
            'is_featured'   => 'boolean|nullable',
            'image'         => 'nullable|mimetypes:image/jpeg,png,jpg,gif,svg,
                                    video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm,video/ogg,
                                    video/ogv,video/oga,video/ogx|max:2000000000000000'
        ];
    }
}
