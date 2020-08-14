<?php

use Illuminate\Database\Seeder;
use App\Topic;
use App\Course;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

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

        $files = ['gf_topic.csv'];
        foreach ($files as $file) {
            $seederFile = Storage::path('seeders/csv/gcse_foundation/topics/'.$file);
            $csv = Reader::createFromPath($seederFile, 'r');
            $csv->setHeaderOffset(0);
            $records = $csv->getRecords();
            foreach ($records as $offset => $record) {
                $course = Course::where('course_code', $record["course_code"])->first();
                $topic = Topic::create([
                    'course_id' => $course->id,
                    'topic_name' => $record["topic_name"],
                    'topic_code' => $record["topic_code"],
                    'topic_desc' => $record["topic_desc"],
                    'topic_index' => $record["topic_index"]
                ]);
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}