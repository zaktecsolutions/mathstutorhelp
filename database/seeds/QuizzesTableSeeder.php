<?php

use Illuminate\Database\Seeder;
use App\Quiz;
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
        quiz::create([
            'quiz_name' => 'MTH GCSE Maths Foundation 1',
            'quiz_code' => '1MA1/1F',
            'quiz_desc' => 'Edexcel-Mathematics- Paper 1 (Non-Calculator)',
            'quiz_type' => 'Exam',
            'quiz_body' => 'questionbank',
            'quiz_level' => 'Foundation',
        ]);
        quiz::create([
            'quiz_name' => 'Number 1- Quiz',
            'quiz_code' => 'GFTQN1',
            'quiz_desc' => 'Number 1- diagnostic quiz',
            'quiz_type' => 'Topic',
            'quiz_body' => 'questionbank',
            'quiz_level' => 'Foundation',
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
