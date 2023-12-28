<?php

namespace App\Http\Requests\User;

use App\Enums\StampTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class CheckBarcodeRequest extends FormRequest
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
            'barcode' => ['required', 'in:'.implode(',', StampTypeEnum::getAllStampCode())],
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return array
     */
    public function messages() {
        return [
            'barcode.required' => 'バーコードを入力して下さい。',
            'barcode.in' => '入力されたバーコードは今回のキャンペーン対象商品と一致しません。',
        ];
    }
}
