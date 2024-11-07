<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLabelRequest extends FormRequest
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
        $updatingCondition = (!is_null($this->label) ? ",name,{$this->label->id}" : '');
        return [
            'name' => "required|string|max:255|unique:labels{$updatingCondition}",
            'description' => 'nullable|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => __('views.label.name_required'),
            'name.unique' => __('views.label.name_unique'),
            'name.max' => __('views.label.name_max'),
        ];
    }
}
