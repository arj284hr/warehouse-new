<?php

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
        $this->call(WareHouseSeeder::class);
        $this->call(UsersSeeder::class);  
        $this->call(DepartmentSeeder::class);  
        // $this->call(NotificationSeeder::class);  
        // $this->call(FollowSeeder::class);  
        $this->call(AttendenceSeeder::class);       
    }
}
