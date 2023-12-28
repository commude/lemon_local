<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReportDownloadRequest extends FormRequest
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
            'date_start' => ['required', 'date_format:Y/m/d', 'after_or_equal:'.config('app.campaign_period.start_at'), 'before_or_equal:'.config('app.campaign_period.end_at'),],
            'date_end' => ['required', 'date_format:Y/m/d', 'after_or_equal:'.config('app.campaign_period.start_at'), 'before_or_equal:'.config('app.campaign_period.end_at'),],
        ];
    }
}
