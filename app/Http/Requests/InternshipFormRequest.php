<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternshipFormRequest extends FormRequest
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
            
            'first_location' => 'nullable|integer',

            'second_location' => 'nullable|integer',

            'proposed_company' => 'nullable|string',

            'company_location' => 'nullable|integer'

        ];
    }
}
