<?php

use App\Lesson;
use App\Question;
use App\Quiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class QuestionsTableSeeder extends Seeder
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
        question::truncate();

        $files = ['a1_questions.csv','a2_questions.csv','g1_questions.csv','g2_questions.csv','n1_questions.csv','n2_questions.csv','p1_questions.csv','rm_questions.csv','s1_questions.csv'];
        foreach ($files as $file) {
            $seederFile = Storage::path('seeders/csv/gcse_foundation/questions/'.$file);
            $csv = Reader::createFromPath($seederFile, 'r');
            $csv->setHeaderOffset(0);
            $records = $csv->getRecords();
            foreach ($records as $offset => $record) {
                $lesson = Lesson::where('lesson_code', $record["lesson_code"])->first();
                $quiz = Quiz::where('quiz_code', $record["quiz_code"])->first();
                $question = question::create([
                    'lesson_id' => $lesson->id,
                    'question_name' => $record["question_name"],
                    'question_body' => $record["question_body"],
                    'question_image' => $record["question_image"],
                    'question_mark' => $record["question_mark"],
                    'question_grade' => $record["question_grade"],
                    'question_code' => $record["question_code"],
                    'question_type' => $record["question_type"],
                    'q_calculator' => $record["q_calculator"] == 'TRUE',
                ]);
                $question->quizzes()->attach($quiz);
            }
        }
        Schema::enableForeignKeyConstraints();
    }
}
