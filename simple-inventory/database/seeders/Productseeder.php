<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate 50 fake products
        Product::factory()->count(10)->create();
    }
    public function run(): void
    {
          $this->call([
            ProductSeeder::class,
    ]);
    }
}
