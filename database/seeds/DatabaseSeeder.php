<?php

use App\Driver;
use App\Loan;
use App\Role;
use App\Status;
use App\User;
use App\Vehicle;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'Owner',
            'guard_name' => 'web'
        ]);

        $admin = User::create([
            'name' => 'Super',
            'last_name' => 'Administrator',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678') // password
        ]);
        $admin->assignRole('Admin');

        $owner = User::create([
            'name' => 'Super',
            'last_name' => 'Owner',
            'email' => 'owner@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678') // password
        ]);
        $owner->assignRole('Owner');

        Driver::create([
            'nama' => 'Bila',
            'alamat' => 'Malang',
            'jenis_kelamin' => 'Perempuan',
            'tlp' => '085656787176'
        ]);

        Vehicle::create([
            'jenis' => 'Truck Box CDE'
        ]);

        Status::create([
            'nama' => 'pending'
        ]);

        Status::create([
            'nama' => 'approved'
        ]);

        Status::create([
            'nama' => 'rejected'
        ]);

        Loan::create([
            'driver_id' => '1',
            'vehicle_id' => '1',
            'tgl_pinjam' => '2022-08-03',
            'batas_waktu' => '2022-08-04'
        ]);
    }
}
