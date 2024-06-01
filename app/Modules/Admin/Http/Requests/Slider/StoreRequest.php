<?php

namespace Admin\Http\Requests\Slider;

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
//              'image'         => 'required|mimes:jpeg,png,jpg,gif,svg|max:2000000',
                'attachment'         => 'required|mimetypes:image/jpeg,png,jpg,gif,svg,
                                    video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/webm,video/ogg,
                                    video/ogv,video/oga,video/ogx|max:15000',
        ];
    }
}
