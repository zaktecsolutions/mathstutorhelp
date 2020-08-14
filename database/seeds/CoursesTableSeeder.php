<?php

use Illuminate\Database\Seeder;
use App\Course;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class CoursesTableSeeder extends Seeder
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
        Course::truncate();

        $files = ['mth_courses.csv'];
        foreach ($files as $file) {

            $seederFile = Storage::path('seeders/csv/gcse_foundation/courses/'.$file);
            $csv = Reader::createFromPath($seederFile, 'r');
            $csv->setHeaderOffset(0);
            $records = $csv->getRecords();
            foreach ($records as $offset => $record) {
                $course = Course::create([
                    'course_name' => $record["course_name"],
                    'course_code' => $record["course_code"],
                    'course_desc' => $record["course_desc"],
                    'course_level' => $record["course_level"],
                    'course_image' => $record["course_image"]
                ]);
            }
        }
        Schema::enableForeignKeyConstraints();
    }
}
