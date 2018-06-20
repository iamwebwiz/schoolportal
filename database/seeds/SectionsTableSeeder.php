<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Section::create([
            'name'=> 'creche',
            'description'=> 'Babies and Toddlers'
        ]);
        App\Section::create([
            'name'=> 'Primary',
            'description'=> 'Children'
        ]);
        App\Section::create([
            'name'=> 'Secondary',
            'description'=> 'Teens and Pre-teens'
        ]);

    }
}
