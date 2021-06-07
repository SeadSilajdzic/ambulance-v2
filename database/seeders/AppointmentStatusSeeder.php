<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointment_statuses')->insert([
            [
                'name' => 'Not performed'
            ],
            [
                'name' => 'In progress'
            ],
            [
                'name' => 'Done'
            ]
        ]);
    }
}
