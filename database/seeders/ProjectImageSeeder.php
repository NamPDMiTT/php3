<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_images')->insert([
            'project_id' => 1,
            'image' => 'https://via.placeholder.com/150',
        ]);
        DB::table('project_images')->insert([
            'project_id' => 1,
            'image' => 'https://via.placeholder.com/150',
        ]);
        DB::table('project_images')->insert([
            'project_id' => 1,
            'image' => 'https://via.placeholder.com/150',
        ]);
        DB::table('project_images')->insert([
            'project_id' => 2,
            'image' => 'https://via.placeholder.com/150',
        ]);
        DB::table('project_images')->insert([
            'project_id' => 2,
            'image' => 'https://via.placeholder.com/150',
        ]);
    }
}
