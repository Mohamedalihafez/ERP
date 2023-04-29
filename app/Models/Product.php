<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = 
    [
        'name' , 'description' , 'price','status' ,'barcode'
    ];

    static function upsertInstance($request)
    {
        $product = Product::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
            $request->all()
            );
        
        return $product;
    }

    //delete_data
    public function deleteInstance()
    {
        return $this->delete();
    }

    
    // Scopes
    public function scopeFilter($query,$request)
    {
        if ( isset($request['name']) ) 
        {
            $query->where('name','like','%'.$request['name'].'%');
        }

        return $query;
    }
  
}
