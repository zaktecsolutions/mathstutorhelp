<?php

use App\Quiz;
use Illuminate\Database\Seeder;
use App\Lesson;
use App\Topic;
use App\Course;

class QuizzesTableSeeder extends Seeder
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
        quiz::truncate();

        $topic = Topic::where('topic_code', 'GFN1')->first();

        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Number 1',
            'quiz_code' => 'GFN1TDQ',
            'quiz_desc' => 'Number 1- Diagnostic Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'diagnostic',
        ]);
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Number 1',
            'quiz_code' => 'GFN1TSQ',
            'quiz_desc' => 'Number 1- Summary Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'summary',
        ]);

        $topic = Topic::where('topic_code', 'GFN2')->first();

        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Number 2',
            'quiz_code' => 'GFN2TDQ',
            'quiz_desc' => 'Number 2- Diagnostic Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'diagnostic',
        ]);
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Number 2',
            'quiz_code' => 'GFN2TSQ',
            'quiz_desc' => 'Number 2- Summary Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'summary',
        ]);

        $topic = Topic::where('topic_code', 'GFA1')->first();
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Algebra 1',
            'quiz_code' => 'GFA1TDQ',
            'quiz_desc' => 'Algebra 1 - Diagnostic Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'diagnostic',
        ]);
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Algebra 1',
            'quiz_code' => 'GFA1TSQ',
            'quiz_desc' => 'Algebra 1  -Summary Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'summary',
        ]);

        $topic = Topic::where('topic_code', 'GFA2')->first();
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Algebra 2',
            'quiz_code' => 'GFA2TDQ',
            'quiz_desc' => 'Algebra 2 - Diagnostic Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'diagnostic',
        ]);
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Algebra 2',
            'quiz_code' => 'GFA2TSQ',
            'quiz_desc' => 'Algebra 2 -Summary Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'summary',
        ]);

        $topic = Topic::where('topic_code', 'GFRP')->first();
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Ratio Proportion',
            'quiz_code' => 'GFRPTDQ',
            'quiz_desc' => 'Ratio Proportion-Diagnostic Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'diagnostic',
        ]);
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Ratio Proportion',
            'quiz_code' => 'GFRPTSQ',
            'quiz_desc' => 'Ratio Proportion-Summary Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'summary',
        ]);

        $topic = Topic::where('topic_code', 'GFGM1')->first();
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Geometry and Measurement 1',
            'quiz_code' => 'GFGM1TDQ',
            'quiz_desc' => 'Geometry and Measurement 1-Diagnostic Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'diagnostic',
        ]);
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Geometry and Measurement 1',
            'quiz_code' => 'GFGM1TSQ',
            'quiz_desc' => 'Geometry and Measurement 1-Summary Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'summary',
        ]);

        $topic = Topic::where('topic_code', 'GFGM2')->first();
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Geometry and Measurement 2',
            'quiz_code' => 'GFGM2TDQ',
            'quiz_desc' => 'Geometry and Measurement 2-Diagnostic Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'diagnostic',
        ]);
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Geometry and Measurement 2',
            'quiz_code' => 'GFGM2TSQ',
            'quiz_desc' => 'Geometry and Measurement 2-Summary Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'summary',
        ]);

        $topic = Topic::where('topic_code', 'GFP1')->first();
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Probability',
            'quiz_code' => 'GFP1TDQ',
            'quiz_desc' => 'Probability-Diagnostic Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'diagnostic',
        ]);
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Probability',
            'quiz_code' => 'GFP1TSQ',
            'quiz_desc' => 'Probability-Summary Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'summary',
        ]);

        $topic = Topic::where('topic_code', 'GFS1')->first();
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Statistics',
            'quiz_code' => 'GFS1TDQ',
            'quiz_desc' => 'Statistics-Diagnostic Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'diagnostic',
        ]);
        quiz::create([
            'topic_id' => $topic->id,
            'quiz_name' => 'Statistics',
            'quiz_code' => 'GFS1TSQ',
            'quiz_desc' => 'Statistics-Summary Quiz',
            'quiz_type' => 'Topic',
            'quiz_subtype' => 'summary',
        ]);

        $lesson = Lesson::where('lesson_code', 'GFN1LC1')->first();

        $topic = Topic::where('topic_code', 'GHN1')->first();
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Place Value and Money',
            'quiz_code' => 'GFN1LQ1',
            'quiz_desc' => 'Place Value and Money Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Negative Number',
            'quiz_code' => 'GFN1LQ2',
            'quiz_desc' => 'Negative Number Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Number Operation',
            'quiz_code' => 'GFN1LQ3',
            'quiz_desc' => 'Number Operation Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Decimal Operation',
            'quiz_code' => 'GFN1LQ4',
            'quiz_desc' => 'Decimal Operation Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Squares,Cubes and Roots',
            'quiz_code' => 'GFN1LQ5',
            'quiz_desc' => 'Squares,Cubes and Roots Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Bidmas',
            'quiz_code' => 'GFN1LQ6',
            'quiz_desc' => 'Bidmas Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Indices',
            'quiz_code' => 'GFN1LQ7',
            'quiz_desc' => 'Indices Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Rounding Numbers and Estimation',
            'quiz_code' => 'GFN1LQ8',
            'quiz_desc' => 'Rounding Numbers and Estimation Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Factors, Multiples and Primes',
            'quiz_code' => 'GFN1LQ9',
            'quiz_desc' => 'Factors, Multiples and Primes Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);
        quiz::create([
            'lesson_id' => $lesson->id,
            'quiz_name' => 'Primefactors, HCF AND LCM',
            'quiz_code' => 'GFN1LQ10',
            'quiz_desc' => 'Primefactors HCF AND LCM Quiz',
            'quiz_type' => 'Lesson',
            'quiz_subtype' => 'summary',
        ]);

        $course = Course::where('course_code', 'MTH-EGF')->first();

        quiz::create([
            'course_id' => $course->id,
            'quiz_name' => 'MTH GCSE Maths Foundation 1',
            'quiz_code' => '1MA1/1F',
            'quiz_desc' => 'Edexcel-Mathematics- Paper 1 (Non-Calculator)',
            'quiz_type' => 'Course',
            'quiz_subtype' => 'exam',
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
