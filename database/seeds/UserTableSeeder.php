<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([

            'username' => 'superadmin',
            'email' => 'superadmin@app.com',
            'password' => Hash::make('admin123'),

        ]);

        $user->attachRole('super_admin');
    }
}
