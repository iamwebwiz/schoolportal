<?php

use Illuminate\Database\Seeder;

class SchoolclassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Schoolclass::create([
            'section_id'=> '1',
            'name'=> 'creche',
            'session_id'=>'1'
        ]);
        App\Schoolclass::create([
            'section_id'=> '1',
            'name'=> 'creche',
            'session_id'=>'2'
        ]);
        App\Schoolclass::create([
            'section_id'=> '1',
            'name'=> 'creche',
            'session_id'=>'3'
        ]);
        App\Schoolclass::create([
            'section_id'=> '2',
            'name'=> 'Basic 2',
            'session_id'=>'1'
        ]);
        App\Schoolclass::create([
            'section_id'=> '2',
            'name'=> 'Basic 2',
            'session_id'=>'2'
        ]);
        App\Schoolclass::create([
            'section_id'=> '2',
            'name'=> 'Basic 3',
            'session_id'=>'3'
        ]);
        App\Schoolclass::create([
            'section_id'=> '3',
            'name'=> 'SS1',
            'session_id'=>'1'
        ]);
        App\Schoolclass::create([
            'section_id'=> '3',
            'name'=> 'SS1',
            'session_id'=>'2'
        ]);
        App\Schoolclass::create([
            'section_id'=> '3',
            'name'=> 'SS1',
            'session_id'=>'3'
        ]);
        App\Schoolclass::create([
            'section_id'=> '3',
            'name'=> 'SS2',
            'session_id'=>'3'
        ]);
    }
}
