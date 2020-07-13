<?php

use Illuminate\Database\Seeder;
use App\Topic;
use App\Course;
class TopicsTableSeeder extends Seeder
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
        Topic::truncate();
        $course = Course::where('course_code', 'MTH-EGF')->first();

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Number 1',
            'topic_code' => 'GFN1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Number 1',
            'topic_index' => '1', 
        ]);
       
        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Number 2',
            'topic_code' => 'GFN2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Number 2',
            'topic_index' => '2', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Algebra 1',
            'topic_code' => 'GFA1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Algebra 1',
            'topic_index' => '3', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Algebra 2',
            'topic_code' => 'GFA2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Algebra 2',
            'topic_index' => '4', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Ratio and Measurement',
            'topic_code' => 'GFRM',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation – Ratio and Measurement',
            'topic_index' => '5', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Geometry 1',
            'topic_code' => 'GFG1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Geometry 1',
            'topic_index' => '6', 
        ]);


        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Geometry 2',
            'topic_code' => 'GFG2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Geometry 2',
            'topic_index' => '7', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Probability',
            'topic_code' => 'GFP1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Probability',
            'topic_index' => '8', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Statistics',
            'topic_code' => 'GFS1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Statistics',
            'topic_index' => '9', 
        ]);

        $course = Course::where('course_code', 'MTH-EGH')->first();

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Number 1',
            'topic_code' => 'GHN1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Higher - Number 1',
            'topic_index' => '1', 
        ]);
       
        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Number 2',
            'topic_code' => 'GHN2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Higher - Number 2',
            'topic_index' => '2', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Algebra 1',
            'topic_code' => 'GHA1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Higher - Algebra 1',
            'topic_index' => '3', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Algebra 2',
            'topic_code' => 'GHA2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Higher - Algebra 2',
            'topic_index' => '4', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Ratio and Measurement ',
            'topic_code' => 'GHRM',
            'topic_desc' => 'MTH GCSE Maths Online Course - Higher – Ratio proportion',
            'topic_index' => '5', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Geometry 1',
            'topic_code' => 'GHG1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Higher - Geometry 1',
            'topic_index' => '6', 
        ]);


        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Geometry 2',
            'topic_code' => 'GHG2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Higher - Geometry 2',
            'topic_index' => '7', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Probability',
            'topic_code' => 'GHP1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Higher - Probability',
            'topic_index' => '8', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Statistics',
            'topic_code' => 'GHS1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Higher - Statistics',
            'topic_index' => '9', 
        ]);
        Schema::enableForeignKeyConstraints();
    }
}