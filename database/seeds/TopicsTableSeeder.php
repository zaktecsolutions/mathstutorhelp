<?php

use Illuminate\Database\Seeder;
use App\Topic;
class TopicsTableSeeder extends Seeder
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
        Topic::truncate();
        Topic::create([
            'topic_name' => 'Number 1',
            'topic_code' => 'GFN1',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Number 1',
            'topic_les_num' => '50',
            'topic_diagnostic_quiz' => 'GFTQN1', 
            'topic_summary_quiz' => 'GFTQN1',
        ]);
        Topic::create([
            'topic_name' => 'Number 2',
            'topic_code' => 'GFN2',
            'topic_desc' => 'MTH GCSE Maths Online Course - Foundation - Number 2',
            'topic_les_num' => '50',
            'topic_diagnostic_quiz' => 'GFTQN2', 
            'topic_summary_quiz' => 'GFTQN2',
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
