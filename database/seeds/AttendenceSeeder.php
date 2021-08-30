<?php

use Illuminate\Database\Seeder;
use App\Attendence;
class AttendenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attendence::create([
            'user_id' => 2,
            'shift' => 'Morning',
            'shift_time' => '09:00 AM',
            'date_and_time' => '2021-06-20 09:00:00',
            'attendence_type' => 'In',
        ]);

        Attendence::create([
            'user_id' => 2,
            'shift' => 'Morning',
            'shift_time' => '09:00 AM',
            'date_and_time' => '2021-06-20 05:00:00',
            'attendence_type' => 'Out',
        ]);

        Attendence::create([
            'user_id' => 2,
            'shift' => 'Morning',
            'shift_time' => '09:00 AM',
            'date_and_time' => '2021-06-20 09:00:00',
            'attendence_type' => 'In',
        ]);

        Attendence::create([
            'user_id' => 2,
            'shift' => 'Morning',
            'shift_time' => '09:00 AM',
            'date_and_time' => '2021-06-21 05:00:00',
            'attendence_type' => 'Out',
        ]);
    }
}
