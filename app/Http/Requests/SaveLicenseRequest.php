<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveLicenseRequest extends FormRequest
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
            'license_key' => 'required|string|min:24|max:450|unique:licenses,license_key,'.$this->get('id'),
            'license_status' => 'required|min:5|max:100',
            'start_date' => 'required|string|min:3|max:100|date_format:Y-m-d',
            'expiry_date' => 'required|string|min:3|max:100|date_format:Y-m-d|after:start_date',
            'remarks' => 'required|string|min:3|max:4800'
        ];
    }
}
