<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\UserRequest;
use App\Models\PasswordReset;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.user.index',[
            'users' => User::filter($request->all())->where('role_id' ,2)->paginate(10),
            'password_tokens' => PasswordReset::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(User $user)
    {
        return view('admin.pages.user.upsert',[
            'user' => $user,
        ]);
    }

    public function addpassword(PasswordChangeRequest $request) 
    {   
        User::where('phone',$request->phone)->update(['password'=> Hash::make($request->password)]);
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function modify(UserRequest $request)
    {
        return User::upsertInstance($request);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function destroy(User $user)
    {
        return $user->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.user.index',[
            'users' => User::filter($request->all())->where('role_id' ,2)->paginate(10),
            'password_tokens' => PasswordReset::all(),
        ]);
    }

    public function reset()
    {
        return view('auth.password-reset-user') ;
    }

 
}

