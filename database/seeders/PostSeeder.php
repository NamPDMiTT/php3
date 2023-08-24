<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'Bài viết 1',
            'image' => '',
            'content' => 'Nội dung bài viết 1',
            'user_id' => 1,
            'category_id' => 1,
            'status' => 1,
        ]);
        DB::table('posts')->insert([
            'title' => 'Bài viết 2',
            'image' => '',
            'content' => 'Nội dung bài viết 2',
            'user_id' => 2,
            'category_id' => 2,
            'status' => 0,
        ]);
        DB::table('posts')->insert([
            'title' => 'Bài viết 3',
            'image' => '',
            'content' => 'Nội dung bài viết 3',
            'user_id' => 3,
            'category_id' => 3,
            'status' => 0,
        ]);
        DB::table('posts')->insert([
            'title' => 'Bài viết 4',
            'image' => '',
            'content' => 'Nội dung bài viết 4',
            'user_id' => 4,
            'category_id' => 4,
            'status' => 1,
        ]);
        DB::table('posts')->insert([
            'title' => 'Bài viết 5',
            'image' => '',
            'content' => 'Nội dung bài viết 5',
            'user_id' => 5,
            'category_id' => 5,
            'status' => 1,
        ]);

    }
}
