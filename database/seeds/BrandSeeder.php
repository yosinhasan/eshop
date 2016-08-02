<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('brands')->insert([
            [
                'name' => 'Fendi',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Guess',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ], [
                'name' => 'Valentino',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ], [
                'name' => 'Dior',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ], [
                'name' => 'Versace',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ], [
                'name' => 'Armani',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Prada',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Dolce and Gabbana',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Chanel',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Gucci',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Nike',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Under Armour',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Adidas',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ], [
                'name' => 'Puma',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'ASICS',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }

}
