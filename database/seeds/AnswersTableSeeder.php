<?php

use Illuminate\Database\Seeder;
use App\Answer;
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
        answer::create([
        
            'ans_image' => '/image/...',
            'ans_body' => '800',
            'ans_explanation' => 'The 8 is the 3rd digit from the right, meaning it’s in the hundreds column. So, the value of it is 800',
        ]);
        answer::create([
            
            'ans_image' => '/image/...',
            'ans_body' => '-2',
            'ans_explanation' => 'negative four add six.',
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
