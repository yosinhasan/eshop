<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('products')->insert([
            [
                'name' => 'Item 1',
                'price' => 756,
                'avatar' => 'product1.jpg',
                'details' => 'details...',
                'brand_id' => 1,
                'available_id' => 1,
                'condition_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Item 2',
                'price' => 556,
                'avatar' => 'product2.jpg',
                'details' => 'details...',
                'brand_id' => 1,
                'available_id' => 1,
                'condition_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Item 3',
                'price' => 656,
                'avatar' => 'product3.jpg',
                'details' => 'details...',
                'brand_id' => 3,
                'available_id' => 1,
                'condition_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Item 4',
                'price' => 546,
                'avatar' => 'product4.jpg',
                'details' => 'details...',
                'brand_id' => 3,
                'available_id' => 1,
                'condition_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Item 5',
                'price' => 526,
                'avatar' => 'product5.jpg',
                'details' => 'details...',
                'brand_id' => 2,
                'available_id' => 1,
                'condition_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Item 6',
                'price' => 561,
                'avatar' => 'product6.jpg',
                'details' => 'details...',
                'brand_id' => 2,
                'available_id' => 1,
                'condition_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }

}
