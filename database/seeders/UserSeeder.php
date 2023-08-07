<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'NamaLengkap' => 'John Doe',
                'UserName' => 'johndoe',
                'password' => Hash::make('123'),
                'NomorHp' => '081234567890',
                'Foto' => 'johndoe.jpg',
                'Roles' => '1',
                'created_at'=> '12123',
                'updated_at'=> '12123'
            ],
    
            // Tambahkan data user lainnya sesuai kebutuhan
        ]);
    }
}
