<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_name' => 'required',
            'service_price' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'service_name.required' => 'Tên dịch vụ là bắt buộc',
            'service_price.required' => 'Giá dịch vụ là bắt buộc',
            'service_price.numeric' => 'Giá dịch vụ phải là số',

        ];
    }
}
