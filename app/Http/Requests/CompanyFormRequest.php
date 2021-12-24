<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class CompanyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if ($this->method() === 'POST') {
            $unique_rules = Rule::unique('companies');
        } else {
            $unique_rules = Rule::unique('companies')->ignore($this->route()->parameter('company')->id);
        }
        return [
            
            'company_name'  => ['required', 'string', $unique_rules],

            'email'  => ['required', 'string', $unique_rules],

            'location' => 'required|string',

            'city' => 'required|integer',

            'total_slots'    => 'required|integer',

            'lat' => 'required|numeric',

            'long' => 'required|numeric'
        ];
    }
}
