<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        // Jill's busy days
        $busy_days = ['Monday', 'Tuesday', 'Wednesday', 'Friday'];
        self::inputBusyDays($busy_days, 'Jill');

        // Jamal's busy days
        $busy_days = ['Sunday', 'Monday', 'Tuesday', 'Thursday', 'Saturday'];
        self::inputBusyDays($busy_days, 'Jamal');
    }

    private function inputBusyDays($busy_days, $user_name) {
        $taken = [];
        foreach ($busy_days as $day) {
            // Find unique reasons
            $randi = rand(0, count($this->reasons) - 1);
            while(isset($taken[$randi])){
                $randi = rand(0, count($this->reasons) - 1);
            }
            $taken[$randi] = true;

            $appointment = new \App\Appointment();
            $appointment->day = $day;
            $appointment->user_id = \App\User::where('name', '=', $user_name)->first()->id;
            $appointment->reason = $this->reasons[$randi];
            $appointment->save();
        }
    }

    private $reasons = [
        "Doctor's Appt",
        "Kids' recital",
        "Wedding",
        "Funeral",
        "Birth",
        "Binge watch netflix",
        "Date at Ramen Sora",
        "Go to the Airport",
        "Graduation",
        "Day to myself",
        "Babysit",
        "Tutor"
    ];
}
