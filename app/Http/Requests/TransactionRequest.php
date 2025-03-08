<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'email' => 'required|email',
            'products_id' => 'required',
            'description' => 'nullable|string|max:255',
            'donate_price' => 'required|numeric|min:1' ,// Menambahkan validasi untuk donate_price
            'metode_pembayaran' => 'required|string', // Validasi untuk metode pembayaran
            'status' => 'required|string|in:pending,success,failed', // Menambahkan validasi untuk status
        ];
    }
}
