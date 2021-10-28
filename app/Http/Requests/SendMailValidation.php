<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name_surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'phone' => [''],
            'subject' => ['required', 'string'],
            'text' => ['required'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name_surname.required' => 'Imię, nazwisko lub nazwa jest wymagana.',
            'email.required' => 'Email jest wymagany',
            'email.email' => 'Email jest nie poprawny',
            'subject.required' => 'Temat jest wymagany',
            'text.required' => 'Wiadomość jest wymagana',
        ];
    }
}
