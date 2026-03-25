<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'A név kitöltése kötelező.',
            'email.required'   => 'Az email cím kitöltése kötelező.',
            'email.email'      => 'Érvényes email címet adjon meg.',
            'subject.required' => 'A tárgy kitöltése kötelező.',
            'message.required' => 'Az üzenet kitöltése kötelező.',
        ];
    }
}
