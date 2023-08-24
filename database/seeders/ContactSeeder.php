<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            'fullname' => 'Phạm Đình Nam',
            'email' => 'nampham24112003@gmail.com',
            'phone' => '0971892946',
            'message' => 'Xin chào, tôi muốn hỏi về sản phẩm này'
        ]);
        DB::table('contacts')->insert([
            'fullname' => 'Lê Công Tiến',
            'email' => 'tienlc@gmail.com',
            'phone' => '0987654321',
            'message' => 'Xin chào, tôi muốn hỏi về sản phẩm này'
        ]);
        DB::table('contacts')->insert([
            'fullname' => 'Đặng Phương Nam',
            'email' => 'namdp@gmail.com',
            'phone' => '0912345678',
            'message' => 'Xin chào, tôi muốn hỏi về sản phẩm này'
        ]);
        DB::table('contacts')->insert([
            'fullname' => 'Nguyễn Gia Thái',
            'email' => 'thaing@gmail.com',
            'phone' => '0923451234',
            'message' => 'Xin chào, tôi muốn hỏi về sản phẩm này'
        ]);
        DB::table('contacts')->insert([
            'fullname' => 'Nguyễn Công Sơn',
            'email' => 'sonnc@gmail.com',
            'phone' => '0934567891',
            'message' => 'Xin chào, tôi muốn hỏi về sản phẩm này'
        ]);
        DB::table('contacts')->insert([
            'fullname' => 'Nguyễn Hà Anh',
            'email' => 'anhnh@gmail.com',
            'phone' => '0945678912',
            'message' => 'Xin chào, tôi muốn hỏi về sản phẩm này'
        ]);
    }
}
