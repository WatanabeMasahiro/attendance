<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Form1Request extends FormRequest
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
            // contents_DB
            'remarks' => 'max:1200',
            'punch' => [
                'required',
                Rule::unique('contents')->where(function($query) {
                    $query->where('field_name', $this->input('field_name'))
                        ->where('staff_name', $this->input('staff_name'));
                }),
            ],
            // 'name'  => 'required|unique:staff,name,' . ',id,field_id,' . $this->input('field_id'),
        ];
    }
}
