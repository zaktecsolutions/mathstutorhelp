 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysLearningPlatformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('topics', function (Blueprint $table) {

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('quizes', function (Blueprint $table) {

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('lessons', function (Blueprint $table) {

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });

        Schema::table('questions', function (Blueprint $table) {

            $table->foreign('quiz_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });

        Schema::table('answers', function (Blueprint $table) {

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });

        Schema::table('digitutor', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

        Schema::table('question_answer', function (Blueprint $table) {

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');

        });

        Schema::table('user_course', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_user_id_foreign');
        });

        Schema::table('topics', function (Blueprint $table) {
            $table->dropForeign('topics_course_id_foreign');

        });

        Schema::table('quizes', function (Blueprint $table) {
            $table->dropForeign('quizes_course_id_foreign');
        });

        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign('lessons_topic_id_foreign');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign('questions_quiz_id_foreign');
            $table->dropForeign('questions_topic_id_foreign');
            $table->dropForeign('questions_lesson_id_foreign');
        });

        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign('answers_question_id_foreign');
        });

        Schema::table('digitutor', function (Blueprint $table) {
            $table->dropForeign('digitutor_user_id_foreign');
        });

        Schema::table('question_answer', function (Blueprint $table) {
            $table->dropForeign('question_answer_question_id_foreign');
            $table->dropForeign('question_answer_answer_id_foreign');
        });

        Schema::table('user_course', function (Blueprint $table) {
            $table->dropForeign('user_courses_user_id_foreign');
            $table->dropForeign('user_courses_course_id_foreign');
        });
    }
}
