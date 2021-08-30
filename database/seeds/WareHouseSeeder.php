<?php

use Illuminate\Database\Seeder;

use App\WareHouse;
class WareHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        $warehouse = WareHouse::create([
        	'customer_name' => 'FOUR HAND FURNITURE',
        	'street_address' => '123 MAIN STREET AUSTIN, TX',
        	'state' => 'Texas',
        	'city' => 'Pflugerville',
        	'zipcode' => '78660',
        	'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'morning_opening_time' =>  '2021-03-03 6:00:00',
            'morning_closing_time' => '2021-03-03 14:00:00',
            'evening_opening_time' => '2021-03-03 14:00:00',
            'evening_closing_time' => '2021-03-03 22:00:00',
            'night_opening_time'  => '2021-03-03 22:00:00',
            'night_closing_time'  => '2021-03-03 6:00:00',
            'weekend_opening_time' => '2021-03-03 8:00:00',
            'weekend_closing_time' => '2021-03-03 16:00:00'
        ]);

         $warehouse = WareHouse::create([
        	'customer_name' => 'FOUR HAND HOME',
            'street_address' => '234 FRONT STREET AUSTIN, TX',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'morning_opening_time' =>  '2021-03-03 6:00:00',
            'morning_closing_time' => '2021-03-03 14:00:00',
            'evening_opening_time' => '2021-03-03 14:00:00',
            'evening_closing_time' => '2021-03-03 22:00:00',
            'night_opening_time'  => '2021-03-03 22:00:00',
            'night_closing_time'  => '2021-03-03 6:00:00',
            'weekend_opening_time' => '2021-03-03 8:00:00',
            'weekend_closing_time' => '2021-03-03 16:00:00'
        ]);

          $warehouse = WareHouse::create([
        	'customer_name' => 'Forcepoint',
            'street_address' => '444 APPLE STREET AUSTIN, TX',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'morning_opening_time' =>  '2021-03-03 6:00:00',
            'morning_closing_time' => '2021-03-03 14:00:00',
            'evening_opening_time' => '2021-03-03 14:00:00',
            'evening_closing_time' => '2021-03-03 22:00:00',
            'night_opening_time'  => '2021-03-03 22:00:00',
            'night_closing_time'  => '2021-03-03 6:00:00',
            'weekend_opening_time' => '2021-03-03 8:00:00',
            'weekend_closing_time' => '2021-03-03 16:00:00'
        ]);
           $warehouse = WareHouse::create([
            'customer_name' => 'Live Oak Brewing Company',
            'street_address' => '234 FRONT STREET AUSTIN, TX',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'morning_opening_time' =>  '2021-03-03 6:00:00',
            'morning_closing_time' => '2021-03-03 14:00:00',
            'evening_opening_time' => '2021-03-03 14:00:00',
            'evening_closing_time' => '2021-03-03 22:00:00',
            'night_opening_time'  => '2021-03-03 22:00:00',
            'night_closing_time'  => '2021-03-03 6:00:00',
            'weekend_opening_time' => '2021-03-03 8:00:00',
            'weekend_closing_time' => '2021-03-03 16:00:00'
        ]);
            $warehouse = WareHouse::create([
            'customer_name' => 'Forestar Group',
            'street_address' => '444 APPLE STREET AUSTIN, TX',
            'state' => 'Texas',
            'city' => 'Pflugerville',
            'zipcode' => '78660',
            'latitude' => '30.266666',
            'longitude' => '-97.733330',
            'morning_opening_time' =>  '2021-03-03 6:00:00',
            'morning_closing_time' => '2021-03-03 14:00:00',
            'evening_opening_time' => '2021-03-03 14:00:00',
            'evening_closing_time' => '2021-03-03 22:00:00',
            'night_opening_time'  => '2021-03-03 22:00:00',
            'night_closing_time'  => '2021-03-03 6:00:00',
            'weekend_opening_time' => '2021-03-03 8:00:00',
            'weekend_closing_time' => '2021-03-03 16:00:00'
        ]);
    }
}
