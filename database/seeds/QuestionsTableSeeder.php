<?php

use App\Question;
use Illuminate\Database\Seeder;

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
        question::create([
            'question_name' => 'Place Value and Money',
            'question_body' => 'Write the following numbers  in figures?  Fifty five million, nine hundred  sixty two  thousand, eight hundred  fifty six',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '1',
            'question_type' => 'scq',
            'question_category' => 'tdq',
            
        ]);

        question::create([
            'question_name' => 'Place Value and Money',
            'question_body' => 'Write the value of 5 in the following number in word from?  965,888,702',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '1',
            'question_type' => 'scq',
            'question_category' => 'tdq',
            
        ]);

        question::create([
            'question_name' => 'Place Value and Money',
            'question_body' => 'Subtract £225,000 from a half a million pound',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '1',
            'question_type' => 'scq',
            'question_category' => 'tdq',
            
        ]);

        question::create([
            'question_name' => 'Place Value and Money',
            'question_body' => 'Write the following numbers  in figures? Six hundred and nineteen thousand',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '1',
            'question_type' => 'scq',
            'question_category' => 'tsq',
            
        ]);

        question::create([
            'question_name' => 'Place Value and Money',
            'question_body' => 'Write the value of 6 in the following number in word from? 11, 657, 554 ',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '1',
            'question_type' => 'scq',
            'question_category' => 'tsq',
            
        ]);

        question::create([
            'question_name' => 'Place Value and Money',
            'question_body' => 'A sticker cost 78p. John has £5. He buys as many stickers he can. Work out the amount of change John should get from £5. Give the answer in pence ',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '1',
            'question_type' => 'scq',
            'question_category' => 'tsq',
            
        ]);

        question::create([
            'question_name' => 'Negative Numbers',
            'question_body' => '4-44',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '2',
            'question_type' => 'scq',
            'question_category' => 'tdq',
            
        ]);

        question::create([
            'question_name' => 'Negative Numbers',
            'question_body' => '-11 + -2',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '2',
            'question_type' => 'scq',
            'question_category' => 'tdq',
            
        ]);

        question::create([
            'question_name' => 'Negative Numbers',
            'question_body' => '3 × –8 ÷ -3',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '2',
            'question_type' => 'scq',
            'question_category' => 'tdq',
            
        ]);

        question::create([
            'question_name' => 'Negative Numbers',
            'question_body' => '- 7 - 43',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '2',
            'question_type' => 'scq',
            'question_category' => 'tsq',
            
        ]);

        question::create([
            'question_name' => 'Negative Numbers',
            'question_body' => '6 - + 30 ',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '2',
            'question_type' => 'scq',
            'question_category' => 'tdq',
            
        ]);

        question::create([
            'question_name' => 'Negative Numbers',
            'question_body' => '45 ÷ -9 ÷ -5',
            'question_image' => '/image/...',
            'question_mark' => '1',
            'question_grade' => '2',
            'question_type' => 'scq',
            'question_category' => 'tdq',
            
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
