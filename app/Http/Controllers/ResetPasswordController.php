<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RequestConfirmPassword;
use App\Http\Requests\RequestPasswordvalidation;
use App\Models\Verification;
use App\Http\Requests\VerificationRequest;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function getPhone()
    {
        return view('auth.reset-password.reset');
    }

    public function postphone(RequestConfirmPassword $request)
    {
        $user = User::where('phone', $request->phone )->where('country_code', $request->countryCode)->first();
        if(!$user) {
            return redirect()->back()->with('success', '');   
        } else {
            session()->put('subscripe.personal',[
                'phone' => $request->phone,
                'country_code' => $request->countryCode,
            ]);
         return view('auth.reset-password.confirm');
        }
    }

    public function verificationCheck(Request $request)
    {
        $verificationCheck = Verification::verifiyId($request->verification_id);
        if ( $verificationCheck ) $this->updatePassword();

        return $verificationCheck;
    }

    public function verification(VerificationRequest $request)
    {
        return Verification::saveVerification($request);
    }
    
    public function verfiyPassword(VerificationRequest $request)
    {
        $verfication = Verification::verifiyId($request);
        session()->get('subscripe.personal',[
            'phone' => $request->phone,
        ]);
     
        if($verfication){
            return view('auth.reset-password.password',['verification'=>$request->verification_id ,'phone' => $request->phone]);
        } else {
            return view('auth.reset-password.reset');
        }
    }

    public function updatePassword()
    {
        return view('auth.reset-password.reset');
    }
    
    public function changepassword(RequestPasswordvalidation $request)
        {       
            User::where('phone',$request->phone_without_country)->update(['password'=> Hash::make($request->password)]);
            return redirect()->route('login');
    }
                 
}

