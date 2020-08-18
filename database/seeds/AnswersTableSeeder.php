<?php

use App\Answer;
use App\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class AnswersTableSeeder extends Seeder
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
        answer::truncate();

        $files = ['a1_answers.csv', 'a2_answers.csv', 'g1_answers.csv', 'g2_answers.csv', 'n1_answers.csv', 'n2_answers.csv', 'p1_answers.csv', 'rm_answers.csv', 's1_answers.csv'];
        foreach ($files as $file) {
            $seederFile = Storage::path('seeders/csv/gcse_foundation/answers/' . $file);
            $csv = Reader::createFromPath($seederFile, 'r');
            $csv->setHeaderOffset(0);
            $records = $csv->getRecords();
            foreach ($records as $offset => $record) {
                $question = Question::where('question_code', $record["question_code"])->first();
                $answer = [
                    'question_id' => $question->id,
                    'ans1_b' => $record["ans1_b"],
                    'ans1_body' => $record["ans1_body"],
                    'ans1_a' => $record["ans1_a"],
                    'ans2_b' => $record["ans2_b"],
                    'ans2_body' => $record["ans2_body"],
                    'ans2_a' => $record["ans2_a"],
                    'ans3_body' => $record["ans3_body"],
                    'ans_explanation' => $record["ans_explanation"],
                    'ans_image' => $record["ans_image"],
                    'question_code' => $record["question_code"],
                ];

                if (array_key_exists('ans_correct', $record) && !empty($record["ans_correct"])) {
                    $answer['ans_correct'] = $record["ans_correct"] != 0;
                }

                Answer::create($answer);
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
