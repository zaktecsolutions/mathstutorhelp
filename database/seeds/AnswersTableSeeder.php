<?php

use App\Answer;
use App\Question;
use Illuminate\Database\Seeder;

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

        $question = Question::where('id', '1')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => 'Six hundred and nineteen thousand',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '2')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => 'million',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '3')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '275 000',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '4')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '619,000',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '5')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => 'ten million',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '6')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '32p',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '7')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '-40',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '8')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '-13',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '9')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '8',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '9')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '8',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '10')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '-50',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '11')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '-24',
            'ans_explanation' => 'EXPLANATION',
        ]);

        $question = Question::where('id', '12')->first();

        answer::create([

            'question_id' => $question->id,
            'ans_body' => '1',
            'ans_explanation' => 'EXPLANATION',
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
