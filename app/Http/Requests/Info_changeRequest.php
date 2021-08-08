<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Info_changeRequest extends FormRequest
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
            // users_DB
            'name' => [
                // 'required',
                Rule::unique('users')
                    ->where(function($query) {
                        $query->where('email', $this->input('email'));
                    })
                    ->where(function($query) {
                        $query->where('pagepass', $this->input('pagepass'));
                    })
                    ->where(function($query) {
                        $query->where('department_onsite', $this->input('department_onsite'));
                    }),
            ],
        ];
    }
}
