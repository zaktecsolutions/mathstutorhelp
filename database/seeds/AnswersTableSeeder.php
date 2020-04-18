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

        $seederFile = Storage::path("seeders/answers.csv");
        $csv = Reader::createFromPath($seederFile, 'r');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();
        foreach ($records as $offset => $record) {
            answer::create([
                'question_id' => $record["question_id"],
                'ans_body' => $record["ans_body"],
                'ans_explanation' => $record["ans_explanation"],
                'ans_image' => $record["ans_image"],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
