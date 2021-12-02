<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name'     => 'Ahmed Herhesh',
            'email'    => 'admin@admin.com',
            'mobile'   => '01152958015',
            'password' => 'secret',
            'role'     => 'admin'
        ]);
    }
}
