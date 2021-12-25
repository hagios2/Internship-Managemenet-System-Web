<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class CoordinatorFormRequest extends FormRequest
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
            $unique_rules = Rule::unique('cordinators');
        } else {
            $unique_rules = Rule::unique('cordinators')->ignore($this->route()->parameter('coordinator')->id);
        }
        return [

            'name'  => ['required', 'string'],

            'email'  => ['required', 'string', $unique_rules],

            'staff_id'  => ['nullable', 'string', $unique_rules],

            'department_id' => ['required', 'integer'],

            'company_id' => ['required', 'integer']
        ];
    }
}
