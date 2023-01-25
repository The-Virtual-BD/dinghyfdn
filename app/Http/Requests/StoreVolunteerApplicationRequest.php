<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVolunteerApplicationRequest extends FormRequest
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
            'vafirstname' =>'required|string',
            'vaphoto' => 'nullable|mimes:png,jpg,jpeg',
            'vacv' => 'nullable|mimes:pdf',
            'vaemail'=>'required|string',
            'vaphone'=>'required|string',
            'vaaddress'=>'required|string',
        ];
    }
}
