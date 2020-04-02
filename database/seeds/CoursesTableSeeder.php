<?php

use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Schema::disableForeignKeyConstraints();
        Course::truncate();
        Course::create([
            'course_name' => 'MTH GCSE Maths Foundation',
            'course_code' => 'MTHGF',
            'course_desc' => 'MTH GCSE Maths Foundation Online Course',
            'course_grade' => 'foundation',
            'course_image' => '../imagepath/', 
        ]);
        Course::create([
            'course_name' => 'MTH GCSE Maths Foundation',
            'course_code' => 'MTHHF',
            'course_desc' => 'MTH GCSE Maths Higher Online Course',
            'course_grade' => 'Higher',
            'course_image' => '../imagepath/', 
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
