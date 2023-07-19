<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3',
            'content'=> 'required|min:3|max:505',
            'user_id' => [
                'required',
                'integer',
                'exists:users,id'
            ],

            'status_id' => [
                'required',
                'integer',
                'exists:statuses,id'
            ],

            'expiration'=> [
                'required',
                'date',
                'after:tomorrow'
            ]
        ];
    }
}
