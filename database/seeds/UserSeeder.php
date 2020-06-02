<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Администратор',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
        ],
        [
            'name' => 'Администратор',
            'email' => 'vostelmah@yandex.ru',
            'password' => bcrypt('admin'),
            'is_admin' => 0,
        ]]
    );
    }
}
