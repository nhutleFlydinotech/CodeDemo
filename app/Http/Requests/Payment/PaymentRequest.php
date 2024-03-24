<?php

namespace App\Http\Requests\Payment;

use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class PaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'money' => ['required', 'numeric', 'min:100'],
            'payment_method' => ['required', Rule::in(['Apple', 'PayJP'])],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $message = '';
        foreach ($validator->errors()->toArray() as $item) {
            $message = $item[0];
            break;
        }

        $statusCodeError = Response::HTTP_FORBIDDEN;
        $json = [
            'code' => $statusCodeError,
            'message' => $message,
        ];
        $response = new JsonResponse($json, $statusCodeError);
        throw (new ValidationException($validator, $response))->status($statusCodeError);
    }
}
