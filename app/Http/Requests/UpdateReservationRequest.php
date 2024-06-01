<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
        // Get all request data
        $data = $this->all();

        // Prepare validation rules
        $rules = [];

        // Define the base rules for fields
        $baseRules = [
            'service_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'required',
                'string',
            ],
            'address' => [
                'required'
            ],
            'age' => [
                'required',
                'integer',
                'min:1'
            ],
            'gender' => [
                'required',
                'string',
            ],
            'note' => [
                'required',
                'string',
            ],
        ];

        // Loop through all data and add validation rules for fields matching the pattern
        foreach ($data as $key => $value) {
            foreach ($baseRules as $field => $rule) {
                if (preg_match('/^' . $field . '\d+$/', $key)) {
                    $rules[$key] = $rule;
                }
            }
        }

        return $rules;
    }
}
