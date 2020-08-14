<template>
  <div>
    <b-progress :value="currentIndex+1" :max="questions.length" show-value animated></b-progress>
    <div v-if="activeQuestion">
      <div>Name : {{activeQuestion.question_name}}</div>
      <div>Body : {{activeQuestion.question_body}}</div>
      <div v-if="activeQuestion.question_image">
        Image :
        <img style="max-height:200px;" :src="'/storage'+activeQuestion.question_image" />
      </div>
      <div>Grade : {{activeQuestion.question_grade}}</div>
      <div>Mark : {{activeQuestion.question_mark}}</div>
      <div class="row">
        <div class="col-2">Answer :</div>
        <div class="col-10">
          <div v-if="activeQuestion.question_type == 'fraction'" style="width:180px;">
            <input v-model="activeQuestion.answer1" type="text" />
            <div style="border: 1px solid black; margin:5px 0;"></div>
            <input v-model="activeQuestion.answer2" type="text" />
          </div>
          <div v-else-if="activeQuestion.question_type == 'matrix'" style="width:220px;">
            <div class="row">
              <div class="col-xs-1">
                <div style="height:100%;width:10px;border:2px solid black; border-right:none;"></div>
              </div>
              <div class="col-xs-10" style="width:180px;padding:10px 0;">
                <input v-model="activeQuestion.answer1" type="text" />
                <div style="margin:10px 0;"></div>
                <input v-model="activeQuestion.answer2" type="text" />
              </div>
              <div class="col-xs-1">
                <div style="height:100%;width:10px;border:2px solid black; border-left:none;"></div>
              </div>
            </div>
          </div>
          <div v-else-if="activeQuestion.question_type == 'mixed'">
            <div class="row">
              <div class="col-xs-6 align-self-center">
                <input v-model="activeQuestion.answer1" type="text" class="mr-2" />
              </div>
              <div class="col-xs-6" style="width:180px;padding:10px 0;">
                <input v-model="activeQuestion.answer2" type="text" />
                <div style="margin:5px 0;border: 1px solid black;"></div>
                <input v-model="activeQuestion.answer3" type="text" />
              </div>
            </div>
          </div>
          <div v-else-if="activeQuestion.question_type == '2-box'">
            <div class="row" style="width:400px;">
              <div class="col-xs-6">
                <input v-model="activeQuestion.answer1" type="text" class="mr-2" />
              </div>
              <div class="col-xs-6">
                <input v-model="activeQuestion.answer2" type="text" />
              </div>
            </div>
          </div>
          <div v-else-if="activeQuestion.question_type == '3-box'">
            <div class="row" style="width:600px;">
              <div class="col-xs-4">
                <input v-model="activeQuestion.answer1" type="text" class="mr-2" />
              </div>
              <div class="col-xs-4">
                <input v-model="activeQuestion.answer2" type="text" class="mr-2" />
              </div>
              <div class="col-xs-4">
                <input v-model="activeQuestion.answer3" type="text" />
              </div>
            </div>
          </div>
          <div v-else>
            <input type="text" v-model="activeQuestion.answer1" />
          </div>
        </div>
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
  data: function () {
    return {
      questions: [],
      activeQuestion: null,
    };
  },
  computed: {
    currentIndex: function () {
      return this.questions.indexOf(this.activeQuestion);
    },
  },
  mounted() {
    axios.get(`/student/quiz/${this.quiz}/questions`).then((response) => {
      this.questions = response.data;
      this.activeQuestion = this.questions[0];
    });
  },
  methods: {
    next: function () {
      this.activeQuestion = this.questions[this.currentIndex + 1];
    },
    previous: function () {
      this.activeQuestion = this.questions[this.currentIndex - 1];
    },
    submit: function () {
      var answers = [];
      this.questions.forEach((question) => {
        answers.push({
          question_id: question.id,
          answer1: question.answer1 || null,
          answer2: question.answer2 || null,
          answer3: question.answer3 || null,
        });
      });
      axios
        .post(`/student/quiz/${this.quiz}/answers`, {
          answers: answers,
        })
        .then((response) => {
          window.location.href = `/digitutor/quiz-result/${response.data.id}`;
        });
    },
  },
};
</script>
