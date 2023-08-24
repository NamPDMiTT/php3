<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post_images')->insert([
            'post_id' => 1,
            'image' => 'https://picsum.photos/seed/picsum/200/300',
        ]);
        DB::table('post_images')->insert([
            'post_id' => 2,
            'image' => 'https://picsum.photos/seed/picsum/200/300',
        ]);
        DB::table('post_images')->insert([
            'post_id' => 3,
            'image' => 'https://picsum.photos/seed/picsum/200/300',
        ]);
        DB::table('post_images')->insert([
            'post_id' => 4,
            'image' => 'https://picsum.photos/seed/picsum/200/300',
        ]);
        DB::table('post_images')->insert([
            'post_id' => 5,
            'image' => 'https://picsum.photos/seed/picsum/200/300',
        ]);
    }
}
