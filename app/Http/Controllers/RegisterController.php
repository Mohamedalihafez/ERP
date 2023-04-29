<?php

namespace App\Http\Controllers;
use App\Http\Requests\RequestPersonal;
use App\Http\Requests\RequestClinic;
use App\Http\Requests\VerificationRequest;
use App\Models\Specialization;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{

    public function personal()
    {
        return view('auth.register');
    }

    public function personalData(RequestPersonal $request)
    {
        session()->put('subscripe.personal',[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_code' => $request->countryCode,
            'date_of_birth' => $request->date_of_birth,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('register.confirm');
    }

    

    public function confirm()
    {
        return view('auth.confirm');
    }

    public function verification(VerificationRequest $request)
    {
        return Verification::saveVerification($request);
    }

    public function verificationCheck(Request $request)
    {
        $verificationCheck = Verification::verifiyId($request->verification_id);

        if ( $verificationCheck ) $this->submitUser();

        return $verificationCheck;
    }

    public function submitUser()
    {
        return User::registerNewClient();
    }

    public function registersucess(){
        return view('auth.success');
    }
}
