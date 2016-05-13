<?php

use Illuminate\Database\Seeder;

class FriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jill = \App\User::where('name', '=', 'Jill')->first();
        $jamal = \App\User::where('name', '=', 'Jamal')->first();
        $jill->addFriend($jamal->id);
    }
}
