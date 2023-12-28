<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckCsvUploadRequest extends FormRequest
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
            'csv_file' => ['required', 'file', 'mimetypes:text/plain', 'mimes:csv,txt'],
        ];
    }

    public function messages() {
        return [
            'csv_file.required'  => 'ファイルを選択してください。',
            'csv_file.file'      => 'ファイルアップロードに失敗しました。',
            'csv_file.mimetypes' => 'ファイル形式が不正です。',
            'csv_file.mimes'     => 'ファイル拡張子が異なります。',
        ];
    }
}
