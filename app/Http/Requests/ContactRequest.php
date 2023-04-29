<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|min:3',
            'subject' => 'required|min:3',
            'comments' => 'required|min:3',
        ];
    }

    public function attributes():array
    {
        return [
            'name' => __('pages.name'),
            'subject' => __('pages.subject'),
            'comments' => __('pages.comments'),
        ];
    }
}
