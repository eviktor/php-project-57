<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskStatusRequest extends FormRequest
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
        $updatingCondition = (!is_null($this->task_status) ? ",name,{$this->task_status->id}" : '');
        return [
            'name' => "required|string|unique:task_statuses{$updatingCondition}",
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
            'name.required' => __('views.task-status.name_required'),
            'name.unique' => __('views.task-status.name_unique'),
        ];
    }
}
