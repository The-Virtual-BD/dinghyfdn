<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'category_id' => 'required|string',
            'body' => 'required',
            'cover' => 'required|mimes:png,jpg,jpeg',
            'thumbnail' => 'required|mimes:png,jpg,jpeg|max:2048|dimensions:width=150,height=150',
            'date_one' => 'required|date',
            'date_two' => 'nullable|date',
            'time_one' => 'required',
            'time_two' => 'nullable',
            'address_line_one' => 'required|string',
            'address_line_two' => 'nullable|string',
            'address_line_three' => 'nullable|string',
            'address_line_four' => 'nullable|string',
            'organizer_name' => 'nullable|string',
            'organizer_phone' => 'nullable|string',
            'organizer_webname' => 'nullable|string',
            'organizer_weblink' => 'nullable|string',
            'status' => 'required|string',
        ];
    }
}
