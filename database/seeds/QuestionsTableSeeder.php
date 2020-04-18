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

        $seederFile = Storage::path("seeders/questions.csv");
        $csv = Reader::createFromPath($seederFile, 'r');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();
        foreach ($records as $offset => $record) {
            $lesson = Lesson::where('lesson_code', $record["lesson_code"])->first();
            $quiz = Quiz::where('quiz_code','GFN1TDQ')->first();
            $question = question::create([
                'id' => $record["id"],
                'lesson_id' => $lesson->id,
                'question_name' => $record["lesson_code"],
                'question_body' => $record["question_body"],
                'question_image' => $record["question_image"],
                'question_mark' => $record["question_mark"],
                'question_grade' => $record["question_grade"],
                'question_type' => $record["question_type"],

            ]);
            $question->quizzes()->attach($quiz);
        }

        Schema::enableForeignKeyConstraints();
    }
}
