<?php

use App\Course;
use App\Lesson;
use App\Quiz;
use App\Topic;
// use App\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class QuizzesTableSeeder extends Seeder
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
        quiz::truncate();
        $seederFile = Storage::path("seeders/quizzes.csv");
        $csv = Reader::createFromPath($seederFile, 'r');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();
        foreach ($records as $offset => $record) {
            $lesson = Lesson::where('lesson_code', $record["lesson_code"])->first();
            $course_id = null;
            if (!empty($record["course_code"])) {
                $course = Course::where('course_code', $record["course_code"])->first();
                $course_id = $course->id;
            }
            $topic_id = null;
            if (!empty($record["topic_code"])) {
                $topic = Topic::where('topic_code', $record["topic_code"])->first();
                $topic_id = $topic->id;
            }
            $lesson_id = null;
            if (!empty($record["lesson_code"])) {
                $lesson = Lesson::where('lesson_code', $record["lesson_code"])->first();
                $lesson_id = $lesson->id;
            }
            // $question = Question::where('question_code', $record["question_code"])->first();
            $quiz = quiz::create([
                'id' => $record["id"],
                'lesson_id' => $lesson_id,
                'topic_id' => $topic_id,
                'course_id' => $course_id,
                'quiz_name' => $record["quiz_name"],
                'quiz_code' => $record["quiz_code"],
                'quiz_desc' => $record["quiz_desc"],
                'quiz_type' => $record["quiz_type"],
                'quiz_subtype' => $record["quiz_subtype"],
            ]);
            // $quiz->question()->attach($question);
        }
        Schema::enableForeignKeyConstraints();
    }
}
