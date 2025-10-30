<?php

//namespace where this class belongs which means 
// products model is stored under app/models
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        //connect to the products table
        use HasFactory;
        //specify which fields are mass assignable
        protected $fillable = [
            'name',
            'sku',
            'description',
            'is_active'
        ];

        //define relationship to stock movements
        public function stockMovements()
        {
            return $this->hasMany(StockMovement::class);
        }

        //accessor to get current stock quantity
        public function getStockQuantityAttribute()
        {
            //return the sum of quantity from related stock movements
            return $this->stockMovements()->sum('quantity');
        }

}
