<?php

namespace App\Http\Requests\Public\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'nullable|string',
            "old_password" => 'nullable|current_password',
            "password" =>"confirmed|nullable|different:old_password|required_with:old_password|min:8",
            "password_confirmation" =>"nullable|required_with:password|required_with:old_password|min:8"
        ];
    }
}
