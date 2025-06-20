<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::Create( [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'nip' => '0000000000',
            'no_hp' => '087880182823',
            'level_id' => '1',
            'jabatan' => 'Admin',
            'password' => Hash::make(123456789),

        ]);

        User::Create( [
            'name' => 'Staff Tu',
            'email' => 'staftu@gmail.com',
            'nip' => '0000000001',
            'no_hp' => '087880182823',
            'level_id' => '2',
            'jabatan' => 'Staff Tu',
            'password' => Hash::make(123456789),

        ]);

        User::Create( [
            'name' => 'Kepala Sekolah',
            'email' => 'kepalasekolah@gmail.com',
            'nip' => '0000000002',
            'no_hp' => '087880182823',
            'level_id' => '3',
            'jabatan' => 'Kepala Sekolah',
            'password' => Hash::make(123456789),

        ]);

         User::Create( [
            'name' => 'Guru',
            'email' => 'guru@gmail.com',
            'nip' => '0000000003',
            'no_hp' => '087880182823',
            'level_id' => '4',
            'jabatan' => 'Guru',
            'password' => Hash::make(123456789),

        ]);





    }
}
