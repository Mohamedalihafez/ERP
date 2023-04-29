<?php

namespace App\Http\Controllers;

use App\Models\Widget;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {     
        return  view('pages.home',[
        ]);  
    }
}
