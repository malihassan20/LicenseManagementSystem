<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
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
            'proj_name' => 'required|string|min:3|max:100',
            'proj_url' => 'nullable|string|max:245|url',
            'description' => 'required|string|min:3|max:4800',
            'typesSelected' => 'required',
            'technologiesSelected' => 'required',
            'start_date' => 'required|string|min:3|max:100|date_format:Y-m-d',
            'end_date' => 'required|string|min:3|max:100|date_format:Y-m-d|after:start_date'
        ];
    }
}
