<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Olu Ajayi',
            'password' => bcrypt('admin'),
            'email' => 'olu@me.com',
            'status' => 'admin'
        ]);

        App\User::create([
            'name' => 'Arnold Babatunde',
            'password' => bcrypt('teacher'),
            'email' => 'arnold@me.com',
            'status' => 'teacher'
        ]);
        App\User::create([
            'name' => 'Karl Egbon',
            'password' => bcrypt('account'),
            'email' => 'karl@me.com',
            'status' => 'account'
        ]);
        App\User::create([
            'name' => 'Emily Adewale',
            'password' => bcrypt('parent'),
            'email' => 'emily@me.com',
            'status' => 'parent'
        ]);
    }
}
