<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            'tour_name'=>'required',
            'tour_describe'=>'required',
            'from'=>'required',
            'to'=>'required',
            'tour_price'=>'required|numeric',
            'tour_image'=>'required|file',
        ];
    }
}
