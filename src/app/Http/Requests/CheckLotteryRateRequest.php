<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckLotteryRateRequest extends FormRequest
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
            'lottery_rate' => [
                'required',
                'numeric',
                'max:100',
                'regex:/\A\d{1,3}(\.\d{1,1})?\z/',
            ],
        ];
    }

    public function messages() {
        return [
            'lottery_rate.required'  => '当選確率を入力して下さい。',
            'numeric'            => '数字を入力して下さい。',
            'max'                => '当選確率の上限は100です。',
            'lottery_rate.regex' => '小数第一位までの数字が入力可能です。',
        ];
    }
}
