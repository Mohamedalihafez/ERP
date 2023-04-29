<?php

namespace App\Http\Requests;

use App\Models\PasswordReset;
use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'password'=>'required|min:8|confirmed',
            'password_confirmation'=>'required',
            'token'=>[function($attribute,$value,$fail){
                    $verificationcheck = PasswordReset::where('token',$value)->where('phone',request()->phone)->first();
                    if(!$verificationcheck){
                        return $fail(__('pages.data_not_found'));
                }
            }]
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'verification_id' => 'required',
            'token'=>'حدث خطأ في البيانات',
            'password.confirmed' => 'تأكيد كلمة السر ليس مشابه',
            'password.min' => 'كلمه السر لابد أن  لا تقل عن 8 أحرف',
        ];
    }
}
