<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Админ',
            'email' => 'admin@mail.ru',
            'role' => 0,
            'password' => bcrypt(123456),
        ]);

        Admin::create([
            'name' => 'Менеджер',
            'email' => 'manager@mail.ru',
            'role' => 1,
            'password' => bcrypt(123456),
        ]);
    }
}
