<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // insert table category
        DB::table('categories')->insert([
            'categoryName' => 'anime'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'art'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'arsitek'
        ]);
    }
}
