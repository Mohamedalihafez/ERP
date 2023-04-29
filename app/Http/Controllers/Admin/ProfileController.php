<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileRequest;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.pages.profile.index');
    }

    public function update(ProfileRequest $request)
    {
        return User::upsertInstance($request);
    }
}
