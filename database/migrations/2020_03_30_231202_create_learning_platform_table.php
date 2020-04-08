<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningPlatformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_name');
            $table->string('course_code');
            $table->string('course_desc');
            $table->string('course_level');
            $table->string('course_image');
            $table->timestamps();
        });

        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('topic_name');
            $table->string('topic_code');
            $table->string('topic_desc');
            $table->integer('topic_les_num');
            $table->string('topic_diagnostic_quiz');
            $table->string('topic_summary_quiz');
            $table->timestamps();
        });

        Schema::create('exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('exam_name');
            $table->string('exam_code');
            $table->string('exam_desc');
            $table->string('exam_body');
            $table->string('exam_level');
            $table->boolean('calculator')->nullable()->default(false);
            $table->timestamps();
        });

        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->string('lesson_name');
            $table->string('lesson_code');
            $table->string('lesson_desc');
            $table->string('lesson_ws');
            $table->string('lesson_body');
            $table->string('lesson_quiz');
            $table->boolean('lesson_completed')->default(false);
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->string('question_name');
            $table->string('question_body');
            $table->string('question_image');
            $table->string('ans_body');
            $table->string('ans_explanation');
            $table->boolean('is_correct')->default(false);
            $table->boolean('published')->default(false);
            $table->timestamps();
        });

        Schema::create('digitutors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('exam_result');
            $table->text('progress');
            $table->integer('user_grade');
            $table->integer('target_grade');
            $table->string('tutor_input');
            $table->string('summary');
            $table->string('next_step');
            $table->timestamps();
        });

        Schema::create('question_topic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('courses');
        Schema::dropIfExists('topics');
        Schema::dropIfExists('exams');
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('digitutors');
        Schema::dropIfExists('question_topic');

    }
}
