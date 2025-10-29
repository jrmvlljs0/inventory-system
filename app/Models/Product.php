<?php

//namespace where this class belongs which means 
// products model is stored under app/models
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        use HasFactory;

        protected $fillable = [
            'name',
            'sku',
            'description',
            'is_active'
        ];
        public function stockMovements()
        {
            return $this->hasMany(StockMovement::class);
        }
        public function getStockQuantityAttribute()
        {
            return $this->stockMovements()->sum('quantity');
        }

}
