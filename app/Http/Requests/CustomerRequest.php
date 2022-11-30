<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 更新時に自分以外を対象にユニークチェックするようにしている
            'customer_code' => [
                Rule::unique('customers')->ignore($this->customer_code, 'customer_code'),
                'required'
            ],
        ];
    }

    public function messages()
    {
        return [
            'customer_code.unique' => '既に使用されている荷主コードです。',
        ];
    }
}
