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
            'course_name' => 'MTH GCSE Maths Foundation -EDEXCEL',
            'course_code' => 'MTH-EGF',
            'course_desc' => 'MTH GCSE Maths Foundation Online Course- Edexcel',
            'course_level' => 'Foundation',
            'course_image' => '../imagepath/foundation', 
        ]);
        Course::create([
            'course_name' => 'MTH GCSE Maths Higher -EDEXCEL',
            'course_code' => 'MTH-EGH',
            'course_desc' => 'MTH GCSE Maths Higher Online Course -Edexcel',
            'course_level' => 'Higher',
            'course_image' => '../imagepath/higher', 
        ]);
        Course::create([
            'course_name' => 'MTH GCSE Maths Higher -OCR',
            'course_code' => 'MTH-OGF',
            'course_desc' => 'MTH GCSE Maths Foundation Online Course -OCR',
            'course_level' => 'Foundation',
            'course_image' => '../imagepath/foundation', 
        ]);
        Course::create([
            'course_name' => 'MTH GCSE Maths Higher -OCR',
            'course_code' => 'MTH-OGH',
            'course_desc' => 'MTH GCSE Maths Higher Online Course -OCR',
            'course_level' => 'Higher',
            'course_image' => '../imagepath/higher', 
        ]);
        Course::create([
            'course_name' => 'MTH GCSE Maths Higher -AQA',
            'course_code' => 'MTH-AGF',
            'course_desc' => 'MTH GCSE Maths Foundation Online Course -AQA',
            'course_level' => 'Foundation',
            'course_image' => '../imagepath/foundation', 
        ]);
        Course::create([
            'course_name' => 'MTH GCSE Maths Higher -AQA',
            'course_code' => 'MTH-AGH',
            'course_desc' => 'MTH GCSE Maths Higher Online Course -AQA',
            'course_level' => 'Higher',
            'course_image' => '../imagepath/higher', 
        ]);
        Course::create([
            'course_name' => 'MTH Functional Skills',
            'course_code' => 'MTH-FS',
            'course_desc' => 'MTH Functional Skills Online Course ',
            'course_level' => 'Higher/Foundation',
            'course_image' => '../imagepath/', 
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
