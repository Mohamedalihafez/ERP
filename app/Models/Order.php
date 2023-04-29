<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = 
    [
        'user_id' , 'quantity' , 'price','product_id' 
    ];

    static function upsertInstance($request)
    {
        $order = Order::updateOrCreate(
            [
                'id' => $request->id ?? null
            ],
            $request->all()
            );
        
        return $order;
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

    static function getPrice($request)
    {
        $data = Product::where("id", $request->product_id)->get(["price", "id"]);
        return $data;
    }
  
    public function product()
    {
        return $this->belongsTo(Product::class );
    }
}
