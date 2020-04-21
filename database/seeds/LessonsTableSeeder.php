<?php

use Illuminate\Database\Seeder;
use App\Lesson;
use App\Topic;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class LessonsTableSeeder extends Seeder
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
        lesson::truncate();
        
      /*   $topic = Topic::where('topic_code', 'GFN1')->first();
        lesson::create([
            'topic_id' => $topic->id,
            'lesson_name' => 'Place Value and Money',
            'lesson_code' => 'GFN1LC1',
            'lesson_desc' => 'To be able to use place value to read and write numbers and solve money problems ',
            'lesson_ws' => 'GFN1WS1',
            'lesson_body' => 'Example/Explanation',
        ]); */

        $seederFile = Storage::path("seeders/lessons.csv");
        $csv = Reader::createFromPath($seederFile, 'r');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();
        foreach ($records as $offset => $record) {
            $topic = Topic::where('topic_code', $record["topic_code"])->first();
            $lesson = lesson::create([
                'topic_id' => $topic->id,
                'id' => $record["id"],
                'lesson_name' => $record["lesson_name"],
                'lesson_code' => $record["lesson_code"],
                'lesson_desc' => $record["lesson_desc"],
                'lesson_body' => $record["lesson_body"],
                'lesson_ws' => $record["lesson_ws"],
               
            ]);
        Schema::enableForeignKeyConstraints();
            }
    }
}
