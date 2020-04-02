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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('course_name');
            $table->string('course_code');
            $table->string('course_desc');
            $table->string('course_grade');
            $table->string('course_image');
            $table->timestamps();
           

        });

        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('topic_name');
            $table->string('topic_code');
            $table->string('topic_desc');
            $table->integer('topic_grade');
            $table->integer('topic_les_num');
            $table->timestamps();
        });

        Schema::create('quizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('quiz_name');
            $table->string('quiz_code');
            $table->string('quiz_desc');
            $table->integer('quiz_grade');
            $table->float('quiz_time');
            $table->timestamps();
        });

        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->string('lesson_code');
            $table->string('lesson_title');
            $table->string('lesson_obj');
            $table->string('lesson_ws');
            $table->string('lesson_body');
            $table->integer('lesson_grade');
            $table->boolean('lesson_completed')->default(false);
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quiz_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->string('question_title');
            $table->string('question_body');
            $table->string('question_image');
            $table->boolean('published')->default(false);
            $table->timestamps();
        });


        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->string('answer_body');
            $table->string('explanation');
            $table->boolean('is_correct')->default(false);
            $table->boolean('published')->default(false);
            $table->timestamps();
        });

        Schema::create('digitutor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('quiz_id')->nullable();
            $table->text('progress');
            $table->integer('grade');
            $table->integer('target_grade');
            $table->string('tutor_input');
            $table->string('summary');
            $table->string('next_step');
            $table->timestamps();
        });

        Schema::create('question_answer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('answer_id')->nullable();
            $table->timestamps();
        });

        Schema::create('user_course', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
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
        Schema::dropIfExists('quizes');
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('digitutor');
        Schema::dropIfExists('question_answer');
        Schema::dropIfExists('user_course');
    }
}
