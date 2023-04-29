<?php
namespace App\Http\Requests;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RequestPasswordvalidation extends FormRequest
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
            'password'=>'required|min:8|confirmed',
            'password_confirmation'=>'required',
            'verification' => [function($attribute,$value,$fail){
                $verificationcheck = Verification::where('phone', '+'  . request()->phone)->first();
                if($verificationcheck){
                    if(!password_verify($value, $verificationcheck->verification_id)){
                        return $fail(__('pages.data_not_found'));
                    }
                }
                else{
                    return $fail(__('pages.data_not_found'));
                }
            }],
        ];
    }

    public function messages()
    {
        return [
            'password.confirmed' => 'تأكيد كلمة السر ليس مشابه',
            'password.min' => 'كلمه السر لابد أن  لا تقل عن 8 أحرف',
        ];
    }


}
