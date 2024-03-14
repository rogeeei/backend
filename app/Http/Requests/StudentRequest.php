<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname'        => 'required|string|max:255',
            'lastname'         => 'required|string',
            'student_id_no'    => 'required|string|max:255',
            'email'            => 'nullable|email',
            'contact_no'       => 'nullable|integer',
        ];
    }
}
