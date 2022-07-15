<?php

namespace App\Http\Requests\V1\Api\Transfer;

use App\Models\Transfer;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransferRequest extends FormRequest
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
            'origin_id' => ['required' , 'exists:bank_accounts,id'],
            'destination_id' => ['required' , 'exists:bank_accounts,id'],
            'amount' => ['required' , 'numeric'],
            'status' => ['nullable', 'in:' . implode(',', Transfer::STATUSES)]
        ];
    }
}
