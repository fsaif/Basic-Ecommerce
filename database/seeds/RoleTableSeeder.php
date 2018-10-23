<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $superAdmin = \App\Role::create([

            'name' => 'super_admin',
            'display_name' => 'super admin',
            'description' => 'can do everything',

        ])->attachPermissions(['c-user','u-user','r-user','d-user','i-users',
            'c-item','u-item','r-item','d-item','i-items','c-category','u-category','r-category',
            'd-category','i-categories','c-comment']);


        $user = \App\Role::create([

            'name' => 'user',
            'display_name' => 'user',
            'description' => 'can do somethings',

        ])->attachPermissions(['u-user','r-user', 'c-item','u-item','r-item','d-item','c-comment']);

    }
}
