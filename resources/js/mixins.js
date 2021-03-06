Vue.component('quiz-component', require('./components/QuizComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.mixin({
    methods: {
        markAnswer: function (feedback_id, status) {
            console.log("hello");
            axios
                .post(`/digitutor/mark-answer`, {
                    feedback_id: feedback_id,
                    status: status
                })
                .then(response => {
                    console.log(response.data);
                    $(".badge-" + feedback_id).removeClass('badge-succes');
                    $(".badge-" + feedback_id).removeClass('badge-warning');
                    $(".badge-" + feedback_id).removeClass('badge-danger');
                    var newStatus = response.data.status == 1 ? 'success' : 'danger';
                    $(".badge-" + feedback_id).addClass('badge-' + newStatus);
                });
        },
        filterQuestions: function () {
            axios
                .get(`/admin/questions/filter`, {
                    params: {
                        topic_id: $("#topic").val(),
                        lesson_id: $("#lesson").val(),
                        quiz_id: $("#quiz").val(),
                        course_id: $("#course_id").val()
                    }
                })
                .then(response => {
                    $("#results").html(response.data);
                });
        },
        filterUsers: function () {
            axios
                .get(`/admin/users/filter`, {
                    params: {
                        role_name: $("#role").val(),
                        course_id: $("#course").val()
                    }
                })
                .then(response => {
                    $("#results").html(response.data);
                });
        },
        filterQuiz: function () {
            axios
                .get(`/admin/quizzes/filter`, {
                    params: {
                        lesson_id: $("#lesson").val(),
                        topic_id: $("#topic").val(),
                        course_id: $("#course").val()
                    }
                })
                .then(response => {
                    $("#results").html(response.data);
                });
        }
    }
})

const app = new Vue({
    el: '#app',
});
