<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;



class PasswordReset extends Model
{
    use HasFactory;

    protected $fillable = ['phone' ,'token'];


    static function upsertInstance($request)
    {
        $token = Str::random(60);

        $request->merge([
            'token' => Hash::make($token),
        ]);

        $PasswordReset = PasswordReset::updateOrCreate(
            [
                'phone' => $request->phone ?? null
            ],
            [
                'token' => $request->token
            ]
            );

        return $PasswordReset;
    }

}
