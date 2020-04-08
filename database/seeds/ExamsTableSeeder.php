<?php

use Illuminate\Database\Seeder;
use App\Exam;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        exam::truncate();
        exam::create([
            'exam_name' => 'MTH GCSE Maths Foundation 1',
            'exam_code' => '1MA1/1F',
            'exam_desc' => 'Edexcel-Mathematics- Paper 1 (Non-Calculator)',
            'exam_body' => 'questions',
            'exam_level' => 'foundation',
        ]);
        exam::create([
            'exam_name' => 'MTH GCSE Maths Foundation 2',
            'exam_code' => '1MA1/2F',
            'exam_desc' => 'Edexcel-Mathematics- Paper 2 (Calculator)',
            'exam_body' => 'questions',
            'exam_level' => 'foundation',
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
