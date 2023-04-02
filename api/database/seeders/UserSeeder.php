<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '管理者',
            'email' => env('ADMIN_ADDRESS'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'admin' => true,
        ]);

        User::create([
            'name' => 'テスト太郎',
            'email' => 'hoge@hoge.com',
            'password' =>  'hoge123',
        ]);
    }
}
