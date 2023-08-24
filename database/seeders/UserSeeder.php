<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'fullname' => 'Phạm Đình Nam',
            'username' => 'nampham',
            'email' => 'nampham24112003@gmail.com',
            'password' => bcrypt('123456'),
            'gender' => 1,
            'avatar' => 'img/1689892229_Myself.jpg',
            'phone' => '0971892946',
            'address' => 'Hà Nội',
            'role_id' => 1,
            'email_verified_at' => now()
        ]);
        DB::table('users')->insert([
            'fullname' => 'Lê Công Tiến',
            'username' => 'tienlc',
            'email' => 'tienlc@gmail.com',
            'password' => bcrypt('tienlc123'),
            'gender' => 1,
            'avatar' => 'img/1689892280_340745011_3320815954895351_7942880981791125154_n.jpg',
            'phone' => '0987654321',
            'address' => 'Hưng Yên',
            'role_id' => 0,
            'email_verified_at' => now()
        ]);
        DB::table('users')->insert([
            'fullname' => 'Đặng Phương Nam',
            'username' => 'namdp',
            'email' => 'namdp@gmail.com',
            'password' => bcrypt('namdp123'),
            'gender' => 1,
            'avatar' => 'img/1689892309_292275414_1057656491521435_8774249983094797131_n.jpg',
            'phone' => '0912345678',
            'address' => 'Thái Bình',
            'role_id' => 0,
            'email_verified_at' => now()
        ]);
        DB::table('users')->insert([
            'fullname' => 'Nguyễn Gia Thái',
            'username' => 'thaing',
            'email' => 'thaing@gmail.com',
            'password' => bcrypt('thaing123'),
            'gender' => 1,
            'avatar' => 'img/1689892333_334645645_180743094665983_2202280245680122336_n.jpg',
            'phone' => '0923451234',
            'address' => 'Hà Nội',
            'role_id' => 1,
            'email_verified_at' => now()
        ]);
        DB::table('users')->insert([
            'fullname' => 'Nguyễn Công Sơn',
            'username' => 'sonnc',
            'email' => 'sonnc@gmail.com',
            'password' => bcrypt('sonnc123'),
            'gender' => 1,
            'avatar' => 'img/1689892380_son.jpg',
            'phone' => '0964245678',
            'address' => 'Hà Nội',
            'role_id' => 0,
            'email_verified_at' => now()
        ]);
        DB::table('users')->insert([
            'fullname' => 'Nguyễn Hà Anh',
            'username' => 'anhnh',
            'email' => 'anhnh@gmail.com',
            'password' => bcrypt('anhnh123'),
            'gender' => 0,
            'avatar' => 'img/1689892401_Hà Anh.jpg',
            'phone' => '0967829345',
            'address' => 'Hà Nội',
            'role_id' => 0,
            'email_verified_at' => now()
        ]);
    }
}
