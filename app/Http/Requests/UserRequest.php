<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class  UserRequest extends FormRequest
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
            'phone' => ['required',function($attribute,$value,$fail)
            {   
                $count = User::where('phone',$value)->where(function($query){
                    $query->where('id','!=', $this->id);
                })->first();

                if ($count) 
                {
                    
                    if($count->preprator == 1)
                    {
                        return $fail(__('pages.This phone is already exist'));
                    }
                }
            }],
            'email' => 'required',
        ];
    }
}
