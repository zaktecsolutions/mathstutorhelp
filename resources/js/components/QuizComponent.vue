<template>
  <div>
    <b-progress :value="currentIndex+1" :max="questions.length" show-value animated></b-progress>

    <div class="card" v-if="activeQuestion" style="min-height: 40vh;">
      <div class="card-body">
        <h5 class="card-title">
          {{activeQuestion.question_name}}
          <span class="d-inline-block" style="float: right">
            <img src="/images/calc.png" v-if="activeQuestion.q_calculator" height="20" />
            <span class="badge badge-primary">Grade : {{activeQuestion.question_grade}}</span>
            <span class="badge badge-secondary">Mark : {{activeQuestion.question_mark}}</span>
          </span>
        </h5>

        <p class="card-text">{{activeQuestion.question_body}}</p>
        <div v-if="activeQuestion.question_image" class="text-center mb-2">
          <img
            style="max-height:200px;max-width: 100%;"
            :src="'/storage'+activeQuestion.question_image"
          />
        </div>
        <div class="answer-container">
          <div>
            <div v-if="activeQuestion.question_type == 'fraction'" style="width:180px;">
              <div class="input-group">
                <div class="input-group-prepend" v-if="activeQuestion.format[0][0]">
                  <span class="input-group-text">{{activeQuestion.format[0][0]}}</span>
                </div>
                <input type="text" v-model="activeQuestion.answer1" />
                <div class="input-group-append" v-if="activeQuestion.format[0][1]">
                  <span class="input-group-text">{{activeQuestion.format[0][1]}}</span>
                </div>
              </div>
              <div style="border: 1px solid black; margin:5px 0;"></div>
              <div class="input-group">
                <div class="input-group-prepend" v-if="activeQuestion.format[1][0]">
                  <span class="input-group-text">{{activeQuestion.format[1][0]}}</span>
                </div>
                <input type="text" v-model="activeQuestion.answer2" />
                <div class="input-group-append" v-if="activeQuestion.format[1][1]">
                  <span class="input-group-text">{{activeQuestion.format[1][1]}}</span>
                </div>
              </div>
            </div>
            <div v-else-if="activeQuestion.question_type == 'matrix'" style="width:220px;">
              <div class="row">
                <div class="col-xs-1">
                  <div style="height:100%;width:10px;border:2px solid black; border-right:none;"></div>
                </div>
                <div class="col-xs-10" style="width:180px;padding:10px 0;">
                  <div class="input-group">
                    <div class="input-group-prepend" v-if="activeQuestion.format[0][0]">
                      <span class="input-group-text">{{activeQuestion.format[0][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer1" />
                    <div class="input-group-append" v-if="activeQuestion.format[0][1]">
                      <span class="input-group-text">{{activeQuestion.format[0][1]}}</span>
                    </div>
                  </div>
                  <div style="margin:10px 0;"></div>
                  <div class="input-group">
                    <div class="input-group-prepend" v-if="activeQuestion.format[1][0]">
                      <span class="input-group-text">{{activeQuestion.format[1][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer2" />
                    <div class="input-group-append" v-if="activeQuestion.format[1][1]">
                      <span class="input-group-text">{{activeQuestion.format[1][1]}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-xs-1">
                  <div style="height:100%;width:10px;border:2px solid black; border-left:none;"></div>
                </div>
              </div>
            </div>
            <div v-else-if="activeQuestion.question_type == 'mixed'">
              <div class="row">
                <div class="col-xs-6 align-self-center">
                  <div class="input-group mr-2">
                    <div class="input-group-prepend" v-if="activeQuestion.format[0][0]">
                      <span class="input-group-text">{{activeQuestion.format[0][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer1" />
                    <div class="input-group-append" v-if="activeQuestion.format[0][1]">
                      <span class="input-group-text">{{activeQuestion.format[0][1]}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6" style="width:180px;padding:10px 0;">
                  <div class="input-group">
                    <div class="input-group-prepend" v-if="activeQuestion.format[1][0]">
                      <span class="input-group-text">{{activeQuestion.format[1][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer2" />
                    <div class="input-group-append" v-if="activeQuestion.format[1][1]">
                      <span class="input-group-text">{{activeQuestion.format[1][1]}}</span>
                    </div>
                  </div>
                  <div style="margin:5px 0;border: 1px solid black;"></div>
                  <div class="input-group">
                    <div class="input-group-prepend" v-if="activeQuestion.format[2][0]">
                      <span class="input-group-text">{{activeQuestion.format[2][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer3" />
                    <div class="input-group-append" v-if="activeQuestion.format[2][1]">
                      <span class="input-group-text">{{activeQuestion.format[2][1]}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div v-else-if="activeQuestion.question_type == '2-box'">
              <div class="row" style="width:400px;">
                <div class="col-xs-6">
                  <div class="input-group mr-2">
                    <div class="input-group-prepend" v-if="activeQuestion.format[0][0]">
                      <span class="input-group-text">{{activeQuestion.format[0][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer1" />
                    <div class="input-group-append" v-if="activeQuestion.format[0][1]">
                      <span class="input-group-text">{{activeQuestion.format[0][1]}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="input-group">
                    <div class="input-group-prepend" v-if="activeQuestion.format[1][0]">
                      <span class="input-group-text">{{activeQuestion.format[1][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer2" />
                    <div class="input-group-append" v-if="activeQuestion.format[1][1]">
                      <span class="input-group-text">{{activeQuestion.format[1][1]}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div v-else-if="activeQuestion.question_type == '3-box'">
              <div class="row" style="width:600px;">
                <div class="col-xs-4">
                  <div class="input-group mr-2">
                    <div class="input-group-prepend" v-if="activeQuestion.format[0][0]">
                      <span class="input-group-text">{{activeQuestion.format[0][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer1" />
                    <div class="input-group-append" v-if="activeQuestion.format[0][1]">
                      <span class="input-group-text">{{activeQuestion.format[0][1]}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="input-group mr-2">
                    <div class="input-group-prepend" v-if="activeQuestion.format[1][0]">
                      <span class="input-group-text">{{activeQuestion.format[1][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer2" />
                    <div class="input-group-append" v-if="activeQuestion.format[1][1]">
                      <span class="input-group-text">{{activeQuestion.format[1][1]}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-xs-4">
                  <div class="input-group">
                    <div class="input-group-prepend" v-if="activeQuestion.format[2][0]">
                      <span class="input-group-text">{{activeQuestion.format[2][0]}}</span>
                    </div>
                    <input type="text" v-model="activeQuestion.answer3" />
                    <div class="input-group-append" v-if="activeQuestion.format[2][1]">
                      <span class="input-group-text">{{activeQuestion.format[2][1]}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div v-else-if="activeQuestion.question_type == 'option'">
              <div class="form-check" v-for="answer in activeQuestion.answers" :key="answer.id">
                <input
                  class="form-check-input"
                  type="radio"
                  name="answer"
                  :id="'a'+answer.id"
                  :value="answer.ans1_body"
                />
                <label class="form-check-label" :for="'a'+answer.id">{{answer.ans1_body}}</label>
              </div>
            </div>
            <div v-else>
              <div class="input-group">
                <div class="input-group-prepend" v-if="activeQuestion.format[0][0]">
                  <span class="input-group-text">{{activeQuestion.format[0][0]}}</span>
                </div>
                <input type="text" v-model="activeQuestion.answer1" />
                <div class="input-group-append" v-if="activeQuestion.format[0][1]">
                  <span class="input-group-text">{{activeQuestion.format[0][1]}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-2">
      <div class="col-md-4">
        <b-button class="form-control btn-success" v-if="currentIndex>0" @click="previous">Previous</b-button>
      </div>
      <div class="col-md-4">
        <b-button class="form-control" v-if="currentIndex==(questions.length-1)" variant="primary" @click="submit">Submit</b-button>
      </div>
      <div class="col-md-4">
        <b-button class="form-control btn-success" v-if="currentIndex<(questions.length-1)" @click="next">Next</b-button>
      </div>
    </div>
  </div>
</template>

<style>
.answer-container {
  position: absolute;
  right: 10px;
  bottom: 10px;
}
</style>

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
