<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerAddRequest extends FormRequest
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
            'nidn' => 'required|unique:lecturers,nidn',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'major' => 'required',
        ];
    }
}
