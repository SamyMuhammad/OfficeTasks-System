<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseTypeRequest extends FormRequest
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
        $id = '';
        if ($this->isMethod('PATCH')) {
            $instance = $this->route('expense_type');
            $id = $instance->id;
        }
        return [
            'name' => 'required|string|unique:expense_types,name,'.$id
        ];
    }
}
