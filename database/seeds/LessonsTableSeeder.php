<?php

use Illuminate\Database\Seeder;
use App\Lesson;
use App\Topic;
class LessonsTableSeeder extends Seeder
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
        lesson::truncate();
        
        $topic = Topic::where('topic_code', 'GFN1')->first();
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Place Value and Money',
            'lesson_code' => 'GFN1LC1',
            'lesson_desc' => 'To be able to use place value to read and write numbers and solve money problems ',
            'lesson_ws' => 'GFN1WS1',
            'lesson_body' => 'Example/Explanation',
        ]);
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Negative Number',
            'lesson_code' => 'GFN1LC2',
            'lesson_desc' => 'To be able to add, subtract, divide and multiply integer numbers',
            'lesson_ws' => 'GFN1WS2',
            'lesson_body' => 'Example/Explanation',
        ]);
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Number Operation',
            'lesson_code' => 'GFN1LC3',
            'lesson_desc' => 'To be able to do four operation with whole numbers',
            'lesson_ws' => 'GFN1WS3',
            'lesson_body' => 'Example/Explanation',
        ]);
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Decimal Operation',
            'lesson_code' => 'GFN1LC4',
            'lesson_desc' => 'To be able to do four operation with decimal numbers',
            'lesson_ws' => 'GFN1WS4',
            'lesson_body' => 'Example/Explanation',
        ]);
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Squares,Cubes and Roots',
            'lesson_code' => 'GFN1LC5',
            'lesson_desc' => 'To be able to recognize square and cube numbers.',
            'lesson_ws' => 'GFN1WS5',
            'lesson_body' => 'Example/Explanation',
        ]);
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Bidmas',
            'lesson_code' => 'GFN1LC6',
            'lesson_desc' => 'To be able to solve sum using Bidmas',
            'lesson_ws' => 'GFN1WS6',
            'lesson_body' => 'Example/Explanation',
        ]);
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Indices',
            'lesson_code' => 'GFN1LC7',
            'lesson_desc' => 'To be able to use indices',
            'lesson_ws' => 'GFN1WS7',
            'lesson_body' => 'Example/Explanation',
        ]);
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Rounding Numbers and Estimation',
            'lesson_code' => 'GFN1LC8',
            'lesson_desc' => 'To be able to round numbers and estimate',
            'lesson_ws' => 'GFN1WS8',
            'lesson_body' => 'Example/Explanation',
        ]);
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Factors,Multiples and Primes',
            'lesson_code' => 'GFN1LC9',
            'lesson_desc' => 'To be able to recognize factors, multiple and prime numbers',
            'lesson_ws' => 'GFN1WS9',
            'lesson_body' => 'Example/Explanation',
        ]);
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Primefactors HCF AND LCM',
            'lesson_code' => 'GFN1LC10',
            'lesson_desc' => 'To be able to calculate primefactors, HCF and LCM',
            'lesson_ws' => 'GFN1WS10',
            'lesson_body' => 'Example/Explanation',
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
