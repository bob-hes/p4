<?php

use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Jill's busy days
        $busy_days = ['Mon', 'Tues', 'Wed', 'Fri'];
        self::inputBusyDays($busy_days, 'Jill');

        // Jamal's busy days
        $busy_days = ['Sun', 'Mon', 'Tues', 'Thurs', 'Sat'];
        self::inputBusyDays($busy_days, 'Jamal');
    }

    private function inputBusyDays($busy_days, $user_name) {
        foreach ($busy_days as $day) {
            $appointment = new \App\Appointment();
            $appointment->day = $day;
            $appointment->user_id = \App\User::where('name', '=', $user_name)->first()->id;
            $appointment->save();
        }
    }
}