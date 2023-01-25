<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|string',
            'short_title' => 'required|string',
            'category_id' => 'required',
            'date' => 'nullable|date',
            'target_fund' => 'required|numeric',
            'raised_fund' => 'required|numeric',
            'body' => 'nullable|string',
            'cover' => 'required|mimes:png,jpg,jpeg',
        ];
    }
}
