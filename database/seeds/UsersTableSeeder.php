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
        $jill = new App\User();
        $jill->name = 'Jill';
        $jill->email = 'jill@nyu.edu';
        $jill->password = \Hash::make('#6seasonandamovie');
        $jill->save();

        $jamal = new App\User();
        $jamal->name = 'Jamal';
        $jamal->email = 'jamal@unlv.edu';
        $jamal->password = \Hash::make('password1234');
        $jamal->save();


    }
}
