<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name' => 'Phạm Đình Nam',
            'gender' => 0,
            'phone' => '0971892946',
            'address' => 'Hà Nội',
            'image' => 'img/1689892229_Myself.jpg',
        ]);
        DB::table('students')->insert([
            'name' => 'Nguyễn Hà Anh',
            'gender' => 1,
            'phone' => '0987654321',
            'address' => 'Hà Nội',
            'image' => 'img/1689892401_Hà Anh.jpg',
        ]);
    }
}
