<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class FriendsController extends Controller
{
    public function showMatches() {
        $user = User::getCurrentUser();
        $friends = $user->friends->pluck('id')->toArray();

        return view('users', ['friends' => $friends, 'users' => self::allUsersDict()]);
    }

    public function addFriend(Request $request) {
        $id = $request->input('id');
        $user = User::getCurrentUser();
        $user->addFriend($id);
    }

    public function removeFriend(Request $request) {
        $id = $request->input('id');
        $user = User::getCurrentUser();
        $user->deleteFriend($id);
    }

    private function allUsersDict() {
        $all = User::all();
        $usersToReturn = [];
        foreach($all as $user) {
            if ($user->id === \Auth::user()->id) {
                continue;
            }
            $usersToReturn[$user->id] = $user->name;
        }
        return $usersToReturn;
    }
}
