<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceiptRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'project' => 'required|string|min:3',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'category_id' => 'required|exists:categories,id',
            'paid' => 'required|numeric|min:0',
            'services' => 'required|array',
            'services.*' => 'required|exists:services,id',
        ];
    }
}
