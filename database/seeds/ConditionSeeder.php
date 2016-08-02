<?php

use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('conditions')->insert([
            [
                'name' => 'New',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Used',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ]);
    }

}
