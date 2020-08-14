<template>
  <div>
    <b-progress :value="currentIndex+1" :max="questions.length" show-value animated></b-progress>
    <div v-if="activeQuestion">
      <div>Name : {{activeQuestion.question_name}}</div>
      <div>Body : {{activeQuestion.question_body}}</div>
      <div v-if="activeQuestion.question_image">Image : <img style="max-height:200px;" :src="'/storage'+activeQuestion.question_image"></div>
      <div>Grade : {{activeQuestion.question_grade}}</div>
      <div>Mark : {{activeQuestion.question_mark}}</div>
      <div>
        Answer :
        <textarea v-model="activeQuestion.answer"></textarea>
      </div>
    </div>
    <div>
      <b-button v-if="currentIndex>0" @click="previous">Previous</b-button>
      <b-button class="float-right" v-if="currentIndex<(questions.length-1)" @click="next">Next</b-button>
    </div>
    <div class="text-center" v-if="currentIndex==(questions.length-1)">
      <b-button variant="primary" @click="submit">Submit</b-button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["quiz"],
  data: function() {
    return {
      questions: [],
      activeQuestion: null
    };
  },
  computed: {
    currentIndex: function() {
      return this.questions.indexOf(this.activeQuestion);
    }
  },
  mounted() {
    axios.get(`/student/quiz/${this.quiz}/questions`).then(response => {
      this.questions = response.data;
      this.activeQuestion = this.questions[0];
    });
  },
  methods: {
    next: function() {
      this.activeQuestion = this.questions[this.currentIndex + 1];
    },
    previous: function() {
      this.activeQuestion = this.questions[this.currentIndex - 1];
    },
    submit: function() {
      var answers = [];
      this.questions.forEach(question => {
        answers.push({
          question_id: question.id,
          answer: question.answer || null
        });
      });
      axios
        .post(`/student/quiz/${this.quiz}/answers`, {
          answers: answers
        })
        .then(response => {
          window.location.href = `/digitutor/quiz-result/${response.data.id}`;
        });
    }
  }
};
</script>
