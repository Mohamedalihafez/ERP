<?php

namespace App\Policies;

use Illuminate\Support\Facades\Gate;

class Gates {

    static function policies()
    {
       
    }

    static function resolve($route_name)
    {
        $gate = true;

       
       return $gate;
    }
}











