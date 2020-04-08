<?php

use Illuminate\Database\Seeder;
use App\Question;
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
            'question_name' => 'placevalue',
            'question_body' => 'In the number 1,899, what is the value of the 8?',
            'question_image' => '/image/...',
            'ans_body' => '800',
            'ans_explanation' => 'The 8 is the 3rd digit from the right, meaning it’s in the hundreds column. So, the value of it is 800',
        ]);
        question::create([
            'question_name' => 'negative number ',
            'question_body' => ' 4-6',
            'question_image' => '/image/...',
            'ans_body' => '-2',
            'ans_explanation' => 'negative four add six.',
        ]);
        Schema::enableForeignKeyConstraints();
    }    
}
