<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMediaRequest extends FormRequest
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
            'media_url' => 'sometimes|url',
            'media_type' => 'sometimes|string|max:255',
            'user_id' => 'sometimes|exists:users,id',
            'chat_id' => 'nullable|exists:chat,id',
            'message_id' => 'nullable|exists:messages,id',
        ];
    }
}
