<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ScheduleController extends Controller
{
    public function showSchedule() {
        $user = \App\User::getCurrentUser();
        return view('scheduleForm');
    }

    public function addTime(Request $request) {

        $user = \App\User::getCurrentUser();

        $busy_time = new \App\Appointment();
        $busy_time->user()->associate($user);

        $busy_time->save();

        return true;
    }

    public function removeTime(Request $request) {
        $user = \App\User::getCurrentUser();
    }

    public function editTime(Request $request) {
        $user = \App\User::getCurrentUser();
    }
    
    
}
