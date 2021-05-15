<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaidSalaryRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'deduction_amount' => ['nullable', 'numeric', 'min:0'],
            'deduction_reason' => ['required_with:deduction_amount', 'string', 'max:191'],
        ];
    }
}
