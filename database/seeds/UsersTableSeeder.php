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

        $user = new App\User();
        $user->name = 'Jasper';
        $user->email = 'jasper@harvard.edu';
        $user->password = \Hash::make('lifeisstrange');
        $user->save();

        $user = new App\User();
        $user->name = 'Jillian';
        $user->email = 'jillian@mit.edu';
        $user->password = \Hash::make('redsox4lyfe');
        $user->save();
    }
}
