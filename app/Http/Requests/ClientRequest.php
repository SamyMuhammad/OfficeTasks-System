<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        if ($this->isMethod('PATCH') || $this->isMethod('PUT')) {
            $instance = $this->route('client');
            $id = $instance->id;
        }
        $rules = [
            'name' => 'required|string|min:3|max:191',
            'phone' => 'required|numeric|unique:clients,phone,'.$id,
        ];
        return $rules;
    }
}
