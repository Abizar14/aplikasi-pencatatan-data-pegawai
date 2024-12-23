<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeder user dan pegawai
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        Pegawai::create([
            'user_id' => $user->id,
            'jabatan' => 'Admin',
            'tanggal_bergabung' => now()
        ]);

        // User 2 Pegawai
        $user2 = User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'pegawai',
        ]);

        Pegawai::create([
            'user_id' => $user2->id,
            'jabatan' => 'Pegawai',
            'tanggal_bergabung' => now()
        ]);

        // user 3 pegawai
        $user3 = User::create([
            'name' => 'Abizar',
            'email' => 'abizar@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'pegawai',
        ]);

        Pegawai::create([
            'user_id' => $user3->id,
            'jabatan' => 'Pegawai',
            'tanggal_bergabung' => now()
        ]);



    }
}
