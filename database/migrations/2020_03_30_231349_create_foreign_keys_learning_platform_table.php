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
        Schema::table('users', function (Blueprint $table) {

            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::table('topics', function (Blueprint $table) {

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('exams', function (Blueprint $table) {

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });

        Schema::table('lessons', function (Blueprint $table) {

            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });

        Schema::table('questions', function (Blueprint $table) {

            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
        Schema::table('digitutors', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

        Schema::table('question_topic', function (Blueprint $table) {

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {

        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['course_id']);

        });

        Schema::table('topics', function (Blueprint $table) {

            $table->dropForeign(['course_id']);

        });

        Schema::table('exams', function (Blueprint $table) {

            $table->dropForeign(['course_id']);
        });

        Schema::table('lessons', function (Blueprint $table) {

            $table->dropForeign(['topic_id']);
        });

        Schema::table('questions', function (Blueprint $table) {

            $table->dropForeign(['exam_id']);
            $table->dropForeign(['lesson_id']);
        });

        Schema::table('digitutors', function (Blueprint $table) {

            $table->dropForeign(['user_id']);

        });

        Schema::table('question_topic', function (Blueprint $table) {

            $table->dropForeign(['question_id']);
            $table->dropForeign(['topic_id']);
        });

    }
}
