<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ScheduleController extends Controller
{
    public function showSchedule() {
        return view('scheduleForm');
    }

    public function addTime() {
        return 5;
    }

    public function removeTime() {

    }

    public function editTime() {

    }
}
