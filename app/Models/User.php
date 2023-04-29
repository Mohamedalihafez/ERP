<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Image;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'speciality_id',
        'country_code',
        'role_id',
    ];

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = ['role'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

     static function upsertInstance($request)
     { 
         $request->merge([
             'country_code' => $request->countryCode,
         ]);
         
         if(!$request->id){
             PasswordReset::upsertInstance($request);
         }
 
         $user = User::updateOrCreate(
             [
                 'id' => $request->id ?? null
             ],
                 $request->all()
             );

         $name = 'picture_'.$user->id.'.png';
 
         if ($request->file('picture')) {
             $image = $request->file('picture');
 
             if (!file_exists(public_path('users/'.$user->id.'/').$name)) {
                 mkdir(public_path('users/'.$user->id.'/'), 0755, true);
             }
 
             Image::make($image)->fit(120, 120)->save(public_path('users/'.$user->id.'/').$name);
 
             $user->picture()->updateOrCreate(
             [
                 'imageable_id' => $user->id,
                 'use_for' => 'picture'
             ],
             [
                 'name' => $name,
                 'use_for' => 'picture'
             ]);
         }
 
         return $user;
     }

     //update_in_table_preprator
     static function updateInstance($request)
    {
        $user =User::where('phone' , $request->phone )->first();
        if($user)
        {
            if(  $user->preprator != 1 ) 
            {
                $user->preprator = 1;
                $user->save(); 

                return $user;
            }
        }

        return $user;
    }
    static function register( $request)
    {
        $request->merge(
            [
            'password' => Hash::make('password')
            ]
        );
        
        $user = User::create($request->all());

        $token = $user->createToken('accessToken')->accessToken;
        
        return  [ 'user' => $user, 'token' => $token] ;
    }


    //delete
    public function deleteInstance()
    {
        return $this->delete();
    }

    //filter
    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) {
            $query->where(function($query) use ($request){
                $query->where('name','like','%'.$request['name'].'%')
                    ->orWhere('phone','like','%'.$request['name'].'%')
                    ->orWhere('email','like','%'.$request['name'].'%');
            });
        }

        return $query;
    }

    public function getAvatarNameAttribute()
    {
        $name = Auth::user()->name;
        $nameParts = explode(' ', trim($name));
        $firstName = array_shift($nameParts);
        $lastName = array_pop($nameParts);

        $initials = (
            mb_substr(ucfirst($firstName), 0, 1) . ($lastName ?
            mb_substr(ucfirst($lastName), 0, 1) : mb_substr(ucfirst($firstName), 0, 1))
        );

        return $initials;
    }
    
    //relation 
    public function picture()
    {
        return $this->morphOne(Gallary::class,'imageable')->where('use_for','picture');
    }


    static function registerNewClient()
    {
        $subscription_user_details = session()->get('subscripe.personal');
        $subscription_user_details['role_id'] = PATIENT;

        $user = User::create($subscription_user_details);
        $user->save();

        return $user;
    }

    //Roles
    public function isSuperAdmin() 
    {
        return Auth::user()->role->id == SUPERADMIN;
    }
    
    public function isOwner() 
    {
        return Auth::user()->role->id == USER;
    }

    public function isPatient() 
    {
        return Auth::user()->role->id == PATIENT;
    }
    //Privileges
    public function hasPrivilege($privilege)
    {  
        if ( $this->isSuperAdmin() ) 
        {
            return true;
        }

        return auth()->user()->role->privileges->whereIn('id',[$privilege])->count();
    }

    public function role()
    {
        return  $this->belongsTo(Role::class, 'role_id');
    }
    
    // Doctor
    public function doctorSchedules()
    {
        return $this->belongsToMany(Schedule::class, 'doctor_schedules', 'doctor_id');
    }
}
