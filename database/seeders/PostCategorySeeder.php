<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_categories')->insert([
            'category_name' => 'Thể thao',
        ]);
        DB::table('post_categories')->insert([
            'category_name' => 'Giải trí',
        ]);
        DB::table('post_categories')->insert([
            'category_name' => 'Kinh tế',
        ]);
        DB::table('post_categories')->insert([
            'category_name' => 'Xã hội',
        ]);
        DB::table('post_categories')->insert([
            'category_name' => 'Giáo dục',
        ]);
    }
}
