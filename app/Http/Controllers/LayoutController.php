<?php

namespace App\Http\Controllers;

use App\Models\Widget;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function home()
    {
        return view('pages.home',[
        ]);
    }


    public function about()
    {
        return view('pages.about.index');
    }

    public function booking()
    {
        return view('pages.booking');
    }

    public function booking_success()
    {
        return view('pages.bookingSuccess');
    }

    public function contact_us()
    {
        return view('pages.contactUs');
    }

    public function register()
    {
        return view('auth.register');
    }


}
