<?php
namespace App\Http\Requests;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
class RequestPersonal extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|digits:10|unique:users,phone',
            'date_of_birth' => ['required','date',function($attribute,$value,$fail){
                $year_now = date('Y');
                $required_year = $year_now - 20;
                $client_birth_year = date('Y',strtotime($value));
                
                if ( $client_birth_year > $required_year )
                    return $fail(__('pages.you_must_be_at_least_20_year_to_be_able_to_subscribe_wit_us'));
            }],
            'countryCode' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'date_of_birth.before_or_equal' => ' يجب ان يكون عمرك علي الاقل 20 عاما لتتمكن من الاشتراك معنا',
            'phone.unique' => ' رقم الهاتف مسجل لدينا بالفعل',
            'email.unique' => 'البريد الالكتروني مسجل لدينا بالفعل',
        ];
    }
}
