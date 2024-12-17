<?php

namespace App\Http\Requests;

use App\Constants\TaskConstants;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'due_date' => 'required|date',
            'priority' => 'required|in:' . TaskConstants::prioritiesKeys(),
            'status' => 'required|in:' . TaskConstants::statusKeys(),
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nazwa zadania jest wymagana.',
            'name.max' => 'Nazwa zadania nie może przekraczać 255 znaków.',
            'due_date.required' => 'Data wykonania jest wymagana.',
            'due_date.date' => 'Data wykonania musi być poprawną datą.',
            'priority.required' => 'Priorytet jest wymagany.',
            'priority.in' => 'Nieprawidłowy priorytet.',
            'status.required' => 'Status jest wymagany.',
            'status.in' => 'Nieprawidłowy status.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }
}
