<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssessmentFormRequest extends FormRequest
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
            
            'interns_understanding_of_companys_business' => 'required|string',

            'interns_technical_abilities' => 'required|string',

            'general_impression_about_intern' => 'required|string', 

            'additional_comment_about_intern' => 'nullable|string',

            'quality_of_internship_report' => 'nullable|string',

            'working_attitude_and_discipline' => 'required|string',

            'productivity_and_quality_of_work'=> 'required|string',

            'knowledge_and_problem_solving_skills' => 'required|string',

            'technical_skills_in_using_engineering_tools' => 'required|string',

            'verbal_and_written_communication_skills' => 'required|string',

            'teamwork_and_leadership_skills' => 'required|string',

            'ability_to_learn_new_knowledge_and_skills' => 'required|string',

            'section_c_additional_comments' => 'nullable|string',

            'section_D_additional_comments' => 'nullable|string',

            'hiring_interest' => 'nullable|boolean',

            'number_of_student' => 'nullable|integer',

            'reason' => 'nullable|string'

        ];
    }
}