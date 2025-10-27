<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // public functions productTable()
    // {
    //    Schema::create('products', function (Blueprint $table) {
    //        $table->id();
    //        $table->string('name');
    //        $table->string('sku')->unique();
    //        $table->text('description')->nullable();
    //    });
    // }
        use HasFactory;

        protected $fillable = [
            'name',
            'sku',
            'description',
        ];
}
