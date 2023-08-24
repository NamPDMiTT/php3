<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            'name' => 'Banner 1',
            'image' => '',
            'description' => 'Banner 1'
        ]);
        DB::table('banners')->insert([
            'name' => 'Banner 2',
            'image' => '',
            'description' => 'Banner 2'
        ]);
        DB::table('banners')->insert([
            'name' => 'Banner 3',
            'image' => '',
            'description' => 'Banner 3'
        ]);
        DB::table('banners')->insert([
            'name' => 'Banner 4',
            'image' => '',
            'description' => 'Banner 4'
        ]);
        DB::table('banners')->insert([
            'name' => 'Banner 5',
            'image' => '',
            'description' => 'Banner 5'
        ]);
    }
}
