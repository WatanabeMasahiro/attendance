<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class Onsite_registerRequest extends FormRequest
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
            // filelds_DB
            'name' => [
                'required',
                Rule::unique('fields')->ignore($this->input('id'))
                    ->where(function($query) {
                        $query->where('user_id', Auth::user()->id);
                }),
            ],
        ];
    }
}
