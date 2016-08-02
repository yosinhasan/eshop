<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->insert([
            [
                'name' => 'Sportswear',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Mens',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ], [
                'name' => 'Womens',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ], [
                'name' => 'Kids',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ], [
                'name' => 'Fashion',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ], [
                'name' => 'Households',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Interiors',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Clothing',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Bags',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Shoes',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }

}
