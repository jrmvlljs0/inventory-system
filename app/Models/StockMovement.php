<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    //connect to the stocck movements table
    //To specify which fields are mass assignable
    protected $fillable = ['product_id', 'quantity', 'reason'];
    
    //define relationship to product
    public function product()
    {

        //each stock movement belongs to a single product 
        return $this->belongsTo(Product::class);
    }
}
