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
            'name'  => 'mohamed fawzy',
            'image' => 'assets/img/user.png',
            'status'    => 1,
            'email' => 'mrrmohamedfawzy@gmail.com',
            'password'  => bcrypt('00000000'),
        ]);
    }
}
