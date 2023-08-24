<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_types')->insert([
            'type_name' => 'Web',
        ]);
        DB::table('project_types')->insert([
            'type_name' => 'Mobile',
        ]);
        DB::table('project_types')->insert([
            'type_name' => 'Desktop',
        ]);
        DB::table('project_types')->insert([
            'type_name' => 'Game',
        ]);
        DB::table('project_types')->insert([
            'type_name' => 'AI',
        ]);
    }
}
