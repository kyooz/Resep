<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        Recipe::factory(20)->create();
        // Article::factory(20)->create();

        User::create([
            'name' => 'Kyooz',
            'email' => 'kyooz@mail.com',
            'password' => bcrypt('12345'),
            'role' => 'Admin'
        ]);

        // User::create([
        //     'name' => 'Faiz',
        //     'email' => 'faiz@mail.com',
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'Daging',
            'slug' => 'daging'
        ]);

        Category::create([
            'name' => 'Ikan',
            'slug' => 'ikan'
        ]);

        Category::create([
            'name' => 'Sayur',
            'slug' => 'sayur'
        ]);

        // Role::create([
        //     'name' => 'Admin',
        //     'slug' => 'admin'
        // ]);

        // Role::create([
        //     'name' => 'Writer',
        //     'slug' => 'writer'
        // ]);

        // Recipe::create([
        //     'title' => 'Resep Pertama',
        //     'slug' => 'resep-pertama',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident magnam temporibus consequuntur assumenda nemo voluptate alias omnis ipsa laboriosam voluptas blanditiis rem, ad velit minima autem vel eveniet cumque reiciendis.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Recipe::create([
        //     'title' => 'Resep Kedua',
        //     'slug' => 'resep-kedua',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident magnam temporibus consequuntur assumenda nemo voluptate alias omnis ipsa laboriosam voluptas blanditiis rem, ad velit minima autem vel eveniet cumque reiciendis.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Recipe::create([
        //     'title' => 'Resep Ketiga',
        //     'slug' => 'resep-ketiga',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident magnam temporibus consequuntur assumenda nemo voluptate alias omnis ipsa laboriosam voluptas blanditiis rem, ad velit minima autem vel eveniet cumque reiciendis.',
        //     'category_id' => 3,
        //     'user_id' => 2
        // ]);
    }
}
