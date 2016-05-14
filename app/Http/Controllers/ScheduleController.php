<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ScheduleController extends Controller
{
    public function showSchedule() {

        // Guests go to landing page
        if(! \Auth::check() ) {
            return view('welcome');
        }

        // Users are shown their schedule
        $user = \App\User::getCurrentUser();
        return view('scheduleForm', ['daysOfWeek' => self::daysOfWeek(), 'appointments' => $user->appointmentsDayToReason()]);
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
    
    private function daysOfWeek() {
        $timestamp = strtotime('next Sunday');
        $days = array();
        for ($i = 0; $i < 7; $i++) {
            $days[] = strftime('%A', $timestamp);
            $timestamp = strtotime('+1 day', $timestamp);
        }
        return $days;
    }
}
