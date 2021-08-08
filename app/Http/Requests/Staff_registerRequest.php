<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Staff_registerRequest extends FormRequest
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
            // staff_DB
            'name' => [
                'required',
                Rule::unique('staff')->ignore($this->input('id'))
                    ->where(function($query) {
                        $query->where('field_id', $this->input('field_id'));
                }),
            ],
            // 'name'  => 'required|unique:staff,name,' . $this->input('id'). ',id,field_id,' . $this->input('field_id'),

            //// ↓controllerに記入の場合↓
            //     ＄＄＄request->validate([
            //         'name' => 'required|unique:staff,name,' . ',id,field_id,' . ＄＄＄request->input('field_id'),
            //    ]);
        ];
    }
}
