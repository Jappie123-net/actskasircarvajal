<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::insert([
            ['fullname'=> 'john airol palanas', 'age'=> 21, 'address' => 'somewhere down the road', 'gender'=> 'secrete'],
        ]);
    }
}
