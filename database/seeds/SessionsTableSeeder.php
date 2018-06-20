<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Sessionsetting::create([
            'session'=> '2015/2016',
            'session_details'=> '2015 Session starts on the 15th'
        ]);
        App\Sessionsetting::create([
            'session'=> '2016/2017',
            'session_details'=> '2016 Session starts on the 10th'
        ]);
        App\Sessionsetting::create([
            'session'=> '2017/2018',
            'session_details'=> '2017 Session starts on the 8th'
        ]);
    }
}
