<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Scopes\TenantScope;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'comments',
    ];

    //Tenancy
    protected static function booted()
    { 
        if(Auth::hasUser())
        {
            if(! Auth::user()->isSuperAdmin())
            {
                static::addGlobalScope(new TenantScope(''));
            } 
        } 
    }

    static function upsertInstance($request)
    {   
        $contact = Contact::create(
            $request->all()
        );

        return $contact;
    }


}
