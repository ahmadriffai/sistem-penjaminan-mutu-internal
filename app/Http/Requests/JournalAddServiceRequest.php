<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JournalAddServiceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'link' => 'required',
            'year' => 'required',
            'month' => 'required',
            'media' => 'required',
            'issn' => 'required',
            'criteria' => 'required',
            'category' => 'required',
            'lecturer_id' => 'required',
            'school_year_id' => 'required'
        ];
    }
}
