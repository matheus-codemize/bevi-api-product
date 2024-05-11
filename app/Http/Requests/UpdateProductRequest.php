<?php

namespace App\Http\Requests;

use App\Rules\EnumRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UpdateProductRequest extends FormRequest
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
        return [
            'name' => "string",
            'price' => "numeric|min:0",
            'stock_quantity' => "integer|min:0",
            'status' => [new EnumRule(['stock', 'replacement', 'lacking'])],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = ['errors' => $validator->errors()];
        $code = JsonResponse::HTTP_UNPROCESSABLE_ENTITY;

        throw new HttpResponseException(response()->json($errors, $code));
    }
}
