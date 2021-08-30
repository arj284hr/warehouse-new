<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $department = Department::create([
            'department_name' => 'Furniture'
        ]);

         $department = Department::create([
            'department_name' => 'Paper'
        ]);

         $department = Department::create([
            'department_name' => 'Electronics'
        ]);

         $department = Department::create([
            'department_name' => 'Hardware'
        ]);

         $department = Department::create([
            'department_name' => 'Heavy Machinery'
        ]);

         $department = Department::create([
            'department_name' => 'Construction'
        ]);
    }
}
