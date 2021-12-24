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
        Log::info(json_encode($this->route()));
        return [
            
            'company_name'  => ['required', 'string', Rule::unique('companies')->ignore($this->id)],

            'email'  => ['required', 'string', Rule::unique('companies')->ignore($this->id)],

            'location' => 'required|string',

            'city' => 'required|integer',

            'total_slots'    => 'required|integer',

            'lat' => 'required|numeric',

            'long' => 'required|numeric'
        ];
    }
}
