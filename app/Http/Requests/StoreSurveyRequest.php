<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurveyRequest extends FormRequest
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
            'number' => 'required|string|unique:surveys',
            'subject' => 'required|string',
            'supervisors' => 'required|string',
            'date' => 'required|date',
            'link' => 'nullable|string',
            'file' => 'nullable|mimes:png,jpg,jpeg,csv,xlx,xls,docx,doc,pdf',
        ];
    }
}
