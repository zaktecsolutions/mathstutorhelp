<?php

use Illuminate\Database\Seeder;
use App\Lesson;
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
        lesson::create([
            'lesson_name' => 'Place Value',
            'lesson_code' => 'GFLCN11',
            'lesson_desc' => 'To be able to use place value to read and write numbers',
            'lesson_ws' => 'GFWSN11',
            'lesson_body' => 'explanation',
            'lesson_quiz' => 'GFLQN11',

        ]);
        lesson::create([
            'lesson_name' => 'Negative Number',
            'lesson_code' => 'GFLCN12',
            'lesson_desc' => 'To be able to use negative numbers',
            'lesson_ws' => 'GFWSN12',
            'lesson_body' => 'explanation',
            'lesson_quiz' => 'GFLQN12',
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
