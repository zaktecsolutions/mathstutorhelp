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
        }
    }
})

const app = new Vue({
    el: '#app',
});
