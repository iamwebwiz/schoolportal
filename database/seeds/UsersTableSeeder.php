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
            'phone'=> '08080994031',
            'type' => 'admin',
            'priviledge' => 'admin'
        ]);

        App\User::create([
            'name' => 'Arnold Babatunde',
            'password' => bcrypt('teacher'),
            'email' => 'arnold@me.com',
            'phone'=> '08080994032',
            'type' => 'teacher',
            'priviledge' => 'teacher'
        ]);
        App\User::create([
            'name' => 'Karl Egbon',
            'password' => bcrypt('account'),
            'email' => 'karl@me.com',
            'phone'=> '08080994033',
            'type' => 'account',
            'priviledge' => 'account'
        ]);
        App\User::create([
            'name' => 'Emily Adewale',
            'password' => bcrypt('parent'),
            'email' => 'emily@me.com',
            'phone'=> '08080994034',
            'type' => 'parent',
            'priviledge' => 'parent'
        ]);
    }
}
