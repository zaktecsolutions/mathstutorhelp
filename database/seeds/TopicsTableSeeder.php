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
        $course = Course::where('course_code', 'MTHGF')->first();

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Number 1',
            'topic_code' => 'GFN1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Number 1',
            'topic_les_num' => '50',
            'topic_quiz' => 'GFTQN1', 
            
        ]);
       
        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Number 2',
            'topic_code' => 'GFN2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Number 2',
            'topic_les_num' => '50',
            'topic_quiz' => 'GFTQN2', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Algebra 1',
            'topic_code' => 'GFA1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Algebra 1',
            'topic_les_num' => '50',
            'topic_quiz' => 'GFTQA1', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Algebra 2',
            'topic_code' => 'GFA2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Algebra 2',
            'topic_les_num' => '50',
            'topic_quiz' => 'GFTQA2
            ', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Ratio Proportion',
            'topic_code' => 'GFRP',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation – Ratio proportion',
            'topic_les_num' => '50',
            'topic_quiz' => 'GFTQRP', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Geometry and Measurement 1',
            'topic_code' => 'GFGM1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Geometry and Measurement 1',
            'topic_les_num' => '50',
            'topic_quiz' => 'GFTQGM1', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Geometry and Measurement 2',
            'topic_code' => 'GFGM2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Geometry and Measurement 2',
            'topic_les_num' => '50',
            'topic_quiz' => 'GFTQGM2', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Probability',
            'topic_code' => 'GFP1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Probability',
            'topic_les_num' => '50',
            'topic_quiz' => 'GFTQP1', 
        ]);

        Topic::create([
            'course_id' => $course->id,
            'topic_name' => 'Statistics',
            'topic_code' => 'GFS1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Statistics',
            'topic_les_num' => '50',
            'topic_quiz' => 'GFTQS1', 
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
