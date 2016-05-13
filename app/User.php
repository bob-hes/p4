<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function appointments() {
        return $this->hasMany('\App\Appointment');
    }

    public function friends() {
        return $this->belongsToMany('\App\User', 'friend_user', 'user_id', 'friend_id');
    }

    public function addFriend($friend_id) {
        $this->friends()->attach($friend_id);
        User::find($friend_id)->friends()->attach($this->id);
    }

    public function deleteFriend($friend_id) {
        $this->friends()->detach($friend_id);
        User::find($friend_id)->friends()->detach($this->id);
    }

    public static function getCurrentUser() {
        $current_id = \Auth::user()->id;
        return User::find($current_id);
    }
}
