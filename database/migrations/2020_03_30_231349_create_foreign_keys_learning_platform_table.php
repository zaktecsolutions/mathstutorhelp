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

            /* Schema::table('users', function (Blueprint $table) {

            $table->foreign('tutor_id')->references('id')->on('users');
        }); */

            Schema::table('topics', function (Blueprint $table) {

                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            });

            Schema::table('quizzes', function (Blueprint $table) {

                $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
                $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            });

            Schema::table('lessons', function (Blueprint $table) {

                $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            });

            Schema::table('questions', function (Blueprint $table) {

                $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            });

            Schema::table('digitutors', function (Blueprint $table) {

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });

            Schema::table('answers', function (Blueprint $table) {

                $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            });

            Schema::table('quizfeedbacks', function (Blueprint $table) {

                $table->foreign('quizresult_id')->references('id')->on('quizresults')->onDelete('cascade');
                $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            });

            Schema::table('quizresults', function (Blueprint $table) {

                $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
                $table->foreign('digitutor_id')->references('id')->on('digitutors')->onDelete('cascade');
            });

            Schema::table('question_quiz', function (Blueprint $table) {

                $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
                $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            });

            Schema::table('conversation', function (Blueprint $table) {

                $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
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
                // $table->dropForeign(['tutor_id']);
            });

            Schema::table('topics', function (Blueprint $table) {

                $table->dropForeign(['course_id']);
            });

            Schema::table('answers', function (Blueprint $table) {

                $table->dropForeign(['question_id']);
            });

            Schema::table('quizzes', function (Blueprint $table) {

                $table->dropForeign(['topic_id']);
                $table->dropForeign(['course_id']);
                $table->dropForeign(['lesson_id']);
            });

            Schema::table('lessons', function (Blueprint $table) {

                $table->dropForeign(['topic_id']);
            });

            Schema::table('questions', function (Blueprint $table) {

                $table->dropForeign(['lesson_id']);
            });

            Schema::table('digitutors', function (Blueprint $table) {

                $table->dropForeign(['user_id']);
            });

            Schema::table('quizfeedbacks', function (Blueprint $table) {

                $table->dropForeign(['quizresult_id']);
                $table->dropForeign(['question_id']);
                $table->dropForeign(['user_id']);
                $table->dropForeign(['answer_id']);
            });

            Schema::table('quizresults', function (Blueprint $table) {

                $table->dropForeign(['quiz_id']);
                $table->dropForeign(['digitutor_id']);
            });

            Schema::table('question_quiz', function (Blueprint $table) {

                $table->dropForeign(['question_id']);
                $table->dropForeign(['quiz_id']);
            });

            Schema::table('conversation', function (Blueprint $table) {
                $table->dropForeign(['to_user_id']);
                $table->dropForeign(['from_user_id']);
                $table->dropForeign(['topic_id']);
            });
        }
    }
