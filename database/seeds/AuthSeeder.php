<?php

use Illuminate\Database\Seeder;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ];

        DB::table('users')->insert($user);
    }
}
