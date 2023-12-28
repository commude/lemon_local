<?php

namespace App\Http\Requests\Admin;

use App\Enums\LotteryEnum;
use Illuminate\Foundation\Http\FormRequest;

class CardFilterRequest extends FormRequest
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
            'mypage_id' => ['sometimes', 'nullable'],
            'tonariwa_id' => ['sometimes', 'nullable'],
            'btc_serial' => ['sometimes', 'nullable'],
            'status' => ['sometimes', 'nullable', 'in:'.implode(',', LotteryEnum::getValues())],
            'winning_rate' => ['sometimes', 'nullable', 'in:'.implode(',', range(1,3))],
        ];
    }
}
