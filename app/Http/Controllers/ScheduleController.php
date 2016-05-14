<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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
        $busy_time->day = $request->input('day');
        $busy_time->reason = $request->input('reason');
        $busy_time->save();

        return true;
    }

    public function removeTime(Request $request) {
        $current_id = \Auth::user()->id;

        $busy_time = Appointment::where('user_id', '=', $current_id)->where('day', '=', $request->input('day'))->first();

        if ($busy_time) {
            $busy_time->delete();
            return 'Deleted';
        }
        else {
            return 'Not found';
        }
    }

    public function editTime(Request $request) {
        $current_id = \Auth::user()->id;

        $busy_time = Appointment::where('user_id', '=', $current_id)->where('day', '=', $request->input('day'))->first();
        $busy_time->day = $request->input('day');
        $busy_time->reason = $request->input('reason');
        $busy_time->save();
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

    private function editAppointment(Request $request, \App\Appointment $busy_time) {

    }
}
