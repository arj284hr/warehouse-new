<?php

use Illuminate\Database\Seeder;

use App\User;
use Carbon\Carbon;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'first_name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 322 6008981',
            'password' => bcrypt('admin'),
            'type' => USER_TYPES['admin'],

        ]);

        $user = User::create([
            'customer_id' => '1',
            'ssn' => '00111',
            'first_name' => 'Kamran',
            'last_name'	=> 'Abrar',
            'email' => 'kamranabrar90@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 323 6691890',
            'fix_pay' => '600',
            'hourly_pay' => '18',
            'address' => '123 MAIN STREET AUSTIN, TX',
            'city' => 'Pflugerville',
            'state' => 'Texas',
            'zipcode' => '78660',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Facility Manager',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['manager']
        ]);

        $user = User::create([
            'customer_id' => '2',
            'ssn' => '00112',
            'first_name' => 'Abdul',
            'last_name' => 'Samad',
            'email' => 'samad@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 331 6447379',
            'fix_pay' => '600',
            'hourly_pay' => '18',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '444 APPLE STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Facility Manager',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['manager']
        ]);

        $user = User::create([
            'customer_id' => '3',
            'ssn' => '00113',
            'first_name' => 'Asad',
            'last_name' => 'Ali',
            'email' => 'asad@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '600',
            'hourly_pay' => '18',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '234 FRONT STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Supervisor',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['manager']

        ]);

        $user = User::create([
            'customer_id' => '4',
            'ssn' => '00114',
            'first_name' => 'Hammad',
            'last_name' => 'Ali',
            'email' => 'asad@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '600',
            'hourly_pay' => '18',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '123 MAIN STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Clerical',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['manager']

        ]);

        $user = User::create([
            'customer_id' => '4',
            'ssn' => '00115',
            'first_name' => 'Qasim',
            'last_name' => 'Ali',
            'email' => 'qasim@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '600',
            'hourly_pay' => '18',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '123 MAIN STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Facility Manager',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['manager']

        ]);



        $user = User::create([
            'customer_id' => '1',
            'warehouse_id' => '1',
            'ssn' => '01111',
            'first_name' => 'Umar',
            'last_name' => 'Ali',
            'email' => 'umar@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '123 MAIN STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'General Labor',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']


        ]);

        $user = User::create([
            'customer_id' => '1',
            'warehouse_id' => '1',
            'ssn' => '01112',
            'first_name' => 'Ajmal',
            'last_name' => 'Hassan',
            'email' => 'ajmal@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
             'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '444 APPLE STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Loader/Unloader',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

        $user = User::create([
            'customer_id' => '1',
            'warehouse_id' => '1',
            'ssn' => '01113',
            'first_name' => 'Waqar',
            'last_name' => 'Ahmad',
            'email' => 'waqar@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
             'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '234 FRONT STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'General Labor',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

        $user = User::create([
            'customer_id' => '2',
            'warehouse_id' => '1',
            'ssn' => '01114',
            'first_name' => 'Naeem',
            'last_name' => 'Bhukhari',
            'email' => 'naeem@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '123 MAIN STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Clerical',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

        $user = User::create([
            'customer_id' => '2',
            'warehouse_id' => '1',
            'ssn' => '01115',
            'first_name' => 'Wasif',
            'last_name' => 'Ali',
            'email' => 'wasif@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
             'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '444 APPLE STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Driver',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

        $user = User::create([
            'customer_id' => '2',
            'warehouse_id' => '1',
            'ssn' => '01116',
            'first_name' => 'Hassan',
            'last_name' => 'Mustafa',
            'email' => 'hassan@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
             'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '234 FRONT STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Yard Driver',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

        $user = User::create([
            'customer_id' => '3',
            'warehouse_id' => '1',
            'ssn' => '01117',
            'first_name' => 'Michael',
            'last_name' => 'Jordan',
            'email' => 'jordan@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
             'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '123 MAIN STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Clerical',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

         $user = User::create([
            'customer_id' => '3',
            'warehouse_id' => '1',
            'ssn' => '01118',
            'first_name' => 'Michael',
            'last_name' => 'Jordan',
            'email' => 'jordan@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
             'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '444 APPLE STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'General Labor',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

          $user = User::create([
            'customer_id' => '3',
            'warehouse_id' => '1',
            'ssn' => '01119',
            'first_name' => 'Michael',
            'last_name' => 'Jordan',
            'email' => 'jordan@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '234 FRONT STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Loader/Unloader',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

          $user = User::create([
            'customer_id' => '4',
            'warehouse_id' => '1',
            'ssn' => '01120',
            'first_name' => 'Michael',
            'last_name' => 'Jordan',
            'email' => 'jordan@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '123 MAIN STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Yard Driver',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

          $user = User::create([
            'customer_id' => '4',
            'warehouse_id' => '1',
            'ssn' => '01121',
            'first_name' => 'Michael',
            'last_name' => 'Jordan',
            'email' => 'jordan@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '444 APPLE STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'General Labor',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);

          $user = User::create([
            'customer_id' => '4',
            'warehouse_id' => '1',
            'ssn' => '01122',
            'first_name' => 'Michael',
            'last_name' => 'Jordan',
            'email' => 'jordan@gmail.com',
            'email_verified_at' => Carbon::now(),
            'phone' => '+92 320 5242576',
            'fix_pay' => '400',
            'hourly_pay' => '15',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'address' => '234 FRONT STREET AUSTIN, TX',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'job_title' => 'Clerical',
            'hiring_date' => '2021-01-01',
            'password' => bcrypt('12345678'),
            'type' => USER_TYPES['employee']
        ]);
    }
}
