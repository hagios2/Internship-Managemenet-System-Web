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

        if(request()->has('default_application'))
        {

            return [

                'company_id' => 'required|integer',

                'default_application' => 'boolean',

                'resume' => 'nullable|string'

            ];

        }elseif(request()->has('preferred_company')){
            
            return [

                'preferred_company_name' => 'required|string',
    
                'preferred_company_location' => 'required|string',
    
                'preferred_company_city' => 'required|string',
                
                'preferred_company' => 'boolean',

            ];
    
        }elseif(request()->has('open_letter')){
            
            return [

                'phone' => 'required|string|min:10|max:15',

                'open_letter' => 'boolean'
            ];
        }

    }
}
