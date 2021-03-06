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
            $table->unsignedBigInteger('course_id');
            $table->string('topic_name');
            $table->string('topic_code');
            $table->string('topic_desc');
            $table->float('topic_index');
            $table->timestamps();
        });

        Schema::create('quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->string('quiz_name');
            $table->string('quiz_code');
            $table->string('quiz_desc');
            $table->string('quiz_type');
            $table->string('quiz_subtype');
            $table->boolean('calculator')->default(false);
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
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lesson_id')->nullable();
            $table->string('question_name');
            $table->text('question_body');
            $table->string('question_type');
            $table->string('question_code');
            $table->string('question_image')->nullable();
            $table->integer('question_mark');
            $table->integer('question_grade');
            $table->boolean('q_calculator')->default(false);
            $table->timestamps();
        });

        Schema::create('digitutors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('quiz_result')->nullable();
            $table->integer('user_grade')->nullable();
            $table->integer('target_grade')->nullable();
            $table->string('tutor_input')->nullable();
            $table->string('notes')->nullable();
            $table->string('next_step')->nullable();
            $table->integer('progress_bar')->nullable();
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id');
            $table->string('ans_image')->nullable();
            $table->string('ans1_b');
            $table->string('ans1_body');
            $table->string('ans1_a');
            $table->string('ans2_b');
            $table->string('ans2_body');
            $table->string('ans2_a');
            $table->string('ans3_body');
            $table->string('question_code');
            $table->text('ans_explanation')->nullable();
            $table->boolean('ans_correct')->default(true);
            $table->timestamps();
        });

        Schema::create('quizfeedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quizresult_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('user_id');
            $table->string('answer1')->nullable();
            $table->string('answer2')->nullable();
            $table->string('answer3')->nullable();
            $table->unsignedBigInteger('answer_id')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::create('quizresults', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('digitutor_id');
            $table->integer('quiz_percent');
            $table->integer('grade');
            $table->timestamps();
        });

        Schema::create('question_quiz', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('quiz_id');
            $table->timestamps();
        });

        Schema::create('conversations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('message');
            $table->boolean('incoming')->default(false);
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('tutor_id');
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
        Schema::dropIfExists('quizzes');
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('quizfeedbacks');
        Schema::dropIfExists('quizresults');
        Schema::dropIfExists('digitutors');
        Schema::dropIfExists('question_quiz');
        Schema::dropIfExists('conversations');
    }
}