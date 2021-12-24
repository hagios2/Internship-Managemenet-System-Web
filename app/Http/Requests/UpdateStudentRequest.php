<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'index_no' => ['required', 'string', 'max:15', 'min:10'],
            'program' => ['required', 'integer'],
            'level' => ['required', 'integer'],
            'phone' => 'required|min:10|max:13|numeric'
        ];
    }
}
