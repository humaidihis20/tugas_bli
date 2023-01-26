<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@bli.com',
            'email_verified_at' => null,
            'password' => Hash::make('superadmin123'),
            'role' => 'superadmin',
            'remember_token' => null,
            'created_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Stock',
            'email' => 'adminstock@bli.com',
            'email_verified_at' => null,
            'password' => Hash::make('adminstock123'),
            'role' => 'adminstock',
            'remember_token' => null,
            'created_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Kasir',
            'email' => 'kasir@bli.com',
            'email_verified_at' => null,
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
            'remember_token' => null,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
