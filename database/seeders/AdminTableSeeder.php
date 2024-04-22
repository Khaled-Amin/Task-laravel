<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $value = '123456';
        $password = Hash::make($value);
        // $adminRecord = [
        //     'id' => 1,
        //     'name' => 'Admin',
        //     'type' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'mobile' => '99999999999',
        //     'password' => $password,
        //     'image' => '',
        //     'status' => '1'
        // ];
        $adminRecordSecond = [
            'id' => 2,
            'name' => 'khaled',
            'type' => 'users',
            'email' => 'khaled@gmail.com',
            'mobile' => '99999999999',
            'password' => $password,
            'image' => '',
            'status' => '1'
        ];
        $adminRecordThird = [
            'id' => 3,
            'name' => 'ahmed',
            'type' => 'users',
            'email' => 'ahmed@gmail.com',
            'mobile' => '99999999999',
            'password' => $password,
            'image' => '',
            'status' => '1'
        ];

        Admin::insert($adminRecordThird);
    }
}
