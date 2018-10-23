<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User CRUD permissions
        $createUser = \App\Permission::create([

            'name' => 'c-user',
            'display_name' => 'create user',
            'description' => 'can add new user',

        ]);

        $updateUser = \App\Permission::create([

            'name' => 'u-user',
            'display_name' => 'update user',
            'description' => 'can update existing user',

        ]);

        $deleteUser = \App\Permission::create([

            'name' => 'd-user',
            'display_name' => 'delete user',
            'description' => 'can delete existing user',

        ]);

        $readUser = \App\Permission::create([

            'name' => 'r-user',
            'display_name' => 'read user',
            'description' => 'can see user details',

        ]);

        $indexUsers = \App\Permission::create([

            'name' => 'i-users',
            'display_name' => 'index users',
            'description' => 'can see all users',

        ]);

        // Product CRUD permissions
        $createItem = \App\Permission::create([

            'name' => 'c-item',
            'display_name' => 'create item',
            'description' => 'can add new item',

        ]);

        $updateItem = \App\Permission::create([

            'name' => 'u-item',
            'display_name' => 'update item',
            'description' => 'can update existing item',

        ]);

        $deleteItem = \App\Permission::create([

            'name' => 'd-item',
            'display_name' => 'delete item',
            'description' => 'can delete existing item',

        ]);

        $readItem = \App\Permission::create([

            'name' => 'r-item',
            'display_name' => 'read item',
            'description' => 'can see item details',

        ]);

        $indexItems = \App\Permission::create([

            'name' => 'i-items',
            'display_name' => 'index items',
            'description' => 'can see all items',

        ]);

        // Categories CRUD permissions
        $createCategory = \App\Permission::create([

            'name' => 'c-category',
            'display_name' => 'create category',
            'description' => 'can add new category',

        ]);

        $updateCategory = \App\Permission::create([

            'name' => 'u-category',
            'display_name' => 'update category',
            'description' => 'can update existing category',

        ]);

        $deleteCategory = \App\Permission::create([

            'name' => 'd-category',
            'display_name' => 'delete category',
            'description' => 'can delete existing category',

        ]);

        $readCategory = \App\Permission::create([

            'name' => 'r-category',
            'display_name' => 'read category',
            'description' => 'can see category details',

        ]);

        $indexCategories = \App\Permission::create([

            'name' => 'i-categories',
            'display_name' => 'index categories',
            'description' => 'can see all categories',

        ]);


        // Comments CRUD permissions
        $createComment = \App\Permission::create([

            'name' => 'c-comment',
            'display_name' => 'create comment',
            'description' => 'can add new comment',

        ]);

        $updateComment = \App\Permission::create([

            'name' => 'u-comment',
            'display_name' => 'update comment',
            'description' => 'can update existing comment',

        ]);

        $deleteComment = \App\Permission::create([

            'name' => 'd-comment',
            'display_name' => 'delete comment',
            'description' => 'can delete existing comment',

        ]);

        $readComment = \App\Permission::create([

            'name' => 'r-comment',
            'display_name' => 'read comment',
            'description' => 'can see comment details',

        ]);

        $indexComments = \App\Permission::create([

            'name' => 'i-comments',
            'display_name' => 'index comments',
            'description' => 'can see all comments',

        ]);
    }
}
