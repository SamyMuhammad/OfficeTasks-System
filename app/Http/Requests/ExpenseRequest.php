<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'service_id' => ['required', 'exists:services,id'],
            'expense_type_id' => ['required', 'exists:expense_types,id'],
            'source' => ['required', 'string', 'max:191'],
            'is_paid' => ['sometimes', 'boolean'],
        ];
    }
}
