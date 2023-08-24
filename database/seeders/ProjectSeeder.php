<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'project_name' => 'Project 1',
            'image' => '',
            'owner' => 'Owner 1',
            'room' => 11,
            'price' => 1000000000,
            'acreage' => 100,
            'address' => 'Address 1',
            'detail' => 'Project 1 detail',
            'author_id' => 1,
            'type_id' => 1,
            'status' => 1,
        ]);
        DB::table('projects')->insert([
            'project_name' => 'Project 2',
            'image' => '',
            'owner' => 'Owner 2',
            'room' => 22,
            'price' => 2000000000,
            'acreage' => 200,
            'address' => 'Address 2',
            'detail' => 'Project 2 detail',
            'author_id' => 2,
            'type_id' => 2,
            'status' => 2,
        ]);
        DB::table('projects')->insert([
            'project_name' => 'Project 3',
            'image' => '',
            'owner' => 'Owner 3',
            'room' => 33,
            'price' => 3000000000,
            'acreage' => 300,
            'address' => 'Address 3',
            'detail' => 'Project 3 detail',
            'author_id' => 3,
            'type_id' => 3,
            'status' => 3,
        ]);
        DB::table('projects')->insert([
            'project_name' => 'Project 4',
            'image' => '',
            'owner' => 'Owner 4',
            'room' => 44,
            'price' => 4000000000,
            'acreage' => 400,
            'address' => 'Address 4',
            'detail' => 'Project 4 detail',
            'author_id' => 4,
            'type_id' => 4,
            'status' => 4,
        ]);
        DB::table('projects')->insert([
            'project_name' => 'Project 5',
            'image' => '',
            'owner' => 'Owner 5',
            'room' => 55,
            'price' => 5000000000,
            'acreage' => 500,
            'address' => 'Address 5',
            'detail' => 'Project 5 detail',
            'author_id' => 5,
            'type_id' => 5,
            'status' => 5,
        ]);
    }
}
