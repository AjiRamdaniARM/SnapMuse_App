<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // insert table category
        DB::table('categories')->insert([
            'categoryName' => 'food'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'sport'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'fashion'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'animal'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'cars'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'teknology'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'forest'
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'aestethic'
        ]);
    }
}
