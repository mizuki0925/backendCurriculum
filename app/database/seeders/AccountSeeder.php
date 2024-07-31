<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一般ユーザー
        DB::table('accounts')->insert([
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'tel' => '08012345678',
                'role' => 2,
        ]);

        //管理者
        DB::table('accounts')->insert([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'tel' => '08012345678',
                'role' => 1,
        ]);
    }
}
