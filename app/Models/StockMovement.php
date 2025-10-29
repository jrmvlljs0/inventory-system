<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    //connect to the stocck movements table
    protected $fillable = ['product_id', 'quantity', 'reason'];
    


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
