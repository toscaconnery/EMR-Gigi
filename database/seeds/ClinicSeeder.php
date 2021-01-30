<?php

use Illuminate\Database\Seeder;
use App\Models\Hospital;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hospital::create([
            'name'       => 'Clinic A',
            'address' => '323 ALEXANDRA ROAD',
            'email'     => 'clinica@gmail.com',
            'phone'     => '234234',
            'join_date' => '2021-01-20',
            'start_work_date'   => '2021-01-20',
        ]);
    }
}
