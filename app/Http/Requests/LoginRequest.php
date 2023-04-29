<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone' => ['required','string',function($attribute,$value,$fail){
                $user = User::where('phone', $value)->first();

                if(!$user || $user->country_code != request()->countryCode){                    
                    return $fail(__('auth.failed'));
                }
            }],
            'password' => 'required|string',
            'countryCode' => 'required',
        ];
    }

    public function attributes():array{
        return [
            'phone' => __('pages.Phone'),
            'password' => __('pages.password'),
            'countryCode' => __('pages.countryCode'),
        ];
    }
}
