<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'  => 'Admin Role',
            'email' => 'admin@role.test',
            'password'  => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');

        $staff = User::create([
            'name'  => 'Staff Role',
            'email' => 'staff@role.test',
            'password'  => bcrypt('12345678'),
            'hospital_id'   => 1
        ]);

        $staff->assignRole('staff');

        $patient = User::create([
            'name'  => 'Patient Role',
            'email' => 'patient@role.test',
            'password'  => bcrypt('12345678')
        ]);

        $patient->assignRole('patient');
    }
}
