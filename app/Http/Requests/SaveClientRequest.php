<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveClientRequest extends FormRequest
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
            'client_name' => 'required|string|min:3|max:100',
            'email' => 'required|email|min:7|max:100|unique:clients,email,'.$this->get('id'),
            'phone' => 'required|string|min:3|max:100|regex:/^([\+][0-9]{1,3}([ \.\-])?)?([\(][0-9]{1,6}[\)])?([0-9 \.\-]{1,32})(([A-Za-z \:]{1,11})?[0-9]{1,4}?)$/
',
            'address' => 'required|string|min:3|max:800',
            'city' => 'required|string|min:3|max:100',
            'state' => 'required|string|min:3|max:100',
            'country' => 'required|string|min:3|max:100',
            'zip_code' => 'required|string|min:3|max:100',
            'industry' => 'required|string|min:2|max:100',
            'description' => 'required|string|min:3|max:4800'
        ];
    }
}
