<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use HasFactory, SoftDeletes;

    static function upsertInstance($request)
    {
        
        $action = Action::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
            [
                'name' => $request->name,
            ]
            );

        return $action;    
    }
}