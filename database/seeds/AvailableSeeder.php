<?php

use Illuminate\Database\Seeder;

class AvailableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('availables')->insert([
            [
                'name' => 'In Stock',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Out of stock',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ]);
    }

}
