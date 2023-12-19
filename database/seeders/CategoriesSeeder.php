<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Mie Instan',
                'desc' => 'Mie Instan'
            ],
            [
                'name' => 'Kopi',
                'desc' => 'Kopi Bubuk'
            ]
        ]);
    }
}
