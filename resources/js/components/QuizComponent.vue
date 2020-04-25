<template>
  <div>
    <div v-if="activeQuestion">
      <div>Index : {{currentIndex + 1}}</div>
      <div>Name : {{activeQuestion.question_name}}</div>
      <div>Body : {{activeQuestion.question_body}}</div>
      <div>Grade : {{activeQuestion.question_grade}}</div>
      <div>Mark : {{activeQuestion.question_mark}}</div>
      <div>
        Answer :
        <textarea v-model="activeQuestion.answer"></textarea>
      </div>
    </div>
    <div>
      <button v-if="currentIndex>0" @click="previous">Prev</button>
      <button v-if="currentIndex<(questions.length-1)" @click="next">Next</button>
      <button @click="submit">Submit</button>
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
          answer: question.answer
        });
      });
      console.log(answers);
    }
  }
};
</script>
