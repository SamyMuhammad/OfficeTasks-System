<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'receipt_id' => ['required', 'exists:receipts,id'],
            'task_status_id' => ['required', 'exists:task_statuses,id'],
            'closing_date' => ['required', 'date_format:Y-m-d'],
            'users' => ['nullable', 'array'],
            'users.*' => ['nullable', 'exists:users,id']
        ];
    }
}
