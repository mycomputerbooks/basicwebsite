<template>
    <div>

        <h6>Laravel View Experimental Vue.js Page</h6>
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#create-modal">
            Add New Question
        </button>
    <br>
        <table class="table table-hover" v-if="questions">
            <thead>
                <tr>
                <!-- <th scope="col">#</th> -->
                <th scope="col">Chapter</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr v-for="(question, index) in questions"> -->
                <tr v-for="(question, index) in sortedArray">
                    <!-- <td>{{index + 1}}</td> -->
                    <td>{{question.chapter}}</td>
                    <td>{{question.title}}</td>
                    <td>{{question.description}}</td>
                    <td><button @click="loadUpdateModal(index)" class="btn btn-info">Edit</button></td>
                    <td><button @click=deleteQuestion(index) class="btn btn-danger">Delete</button></td>
                </tr>
            </tbody>
        </table>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" v-if="errors.length > 0">
                        <ul>
                            <li v-for="error in errors">{{error}}</li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="chapter">Chapter</label>
                        <input v-model="question.chapter" type="text" id="chapter" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input v-model="question.title" type="text" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="desctiption">Desctiption</label>
                        <input v-model="question.description" type="text" id="desctiption" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button @click="createQuestion" type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{error}}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="chapter">Chapter</label>
                            <input v-model="new_update_question.chapter" type="text" id="chapter" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input v-model="new_update_question.title" type="text" id="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="desctiption">Desctiption</label>
                            <input v-model="new_update_question.description" type="text" id="desctiption" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="updateQuestion" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return{
                question:{
                    chapter: '',
                    title: '',
                    description: ''
                },
                questions: [],
                uri: 'http://basicsite:8888/questionsview',
                errors: [],
                new_update_question: []


                //toastr: toastr.options = {"positionClass": "toast-top-full-width"}
            }
        },
        methods: {
            // createQuestions(){
            //     var chapter = this.question.chapter;
            //     alert(chapter);
            //     //console.log(this.question.chapter);
            // },
            loadUpdateModal(index){

                this.errors = [];
                $("#update-modal").modal("show");
                this.new_update_question = this.questions[index];

            },

            createQuestion(){
                var chapter = this.question.chapter;
                var title = this.question.title;
                var description = this.question.description;
                // axios.post(this.uri, {chapter: this.question.chapter, title: this.question.title, description: this.question.description})
                axios.post(this.uri, {chapter: chapter, title: title, description: description})
                .then(response=>{

                    this.questions.push(response.data.question);

                    this.resetData();
                    $("#create-modal").modal("hide");

                    //toastr.success(response.data.message);

                })
                .catch(error=>{
                    console.log(error)
                    this.errors = [];
                    if(error.response.data.errors.title){
                        this.errors.push(error.response.data.errors.title[0]);

                    }
                });
            },
            updateQuestion(){

                axios.patch(this.uri + "/" + this.new_update_question.id, {
                   chapter: this.new_update_question.chapter,
                   title: this.new_update_question.title,
                   description: this.new_update_question.description,

               }).then(response =>{

                   $("#update-modal").modal("hide");
                    //toastr.success(response.data.message);

               }).catch(error=>{
                    console.log(error)
                    if(error.response.data.errors.title){
                    this.errors.push(error.response.data.errors.title[0]);
                    }
                });

            },

            deleteQuestion(index){

                let confirmBox = confirm("Do you really want to delete this?");

                if(confirmBox == true){

                    axios.delete(this.uri + "/" + this.questions[index].id)
                            .then(response=>{

                              this.$delete(this.questions, index);
                               //toastr.success(response.data.message);


                          }).catch(error=>{

                         console.log("Could not delete for some reason")
                    });

                }


            },

            loadQuestions(){
                axios.get(this.uri).then(response=>{

                    this.questions = response.data.questions;

                });
            },

            resetData(){

                this.question.chapter = '';
                this.question.title = '';
                this.question.description = '';

            }

        },
        computed: {
            sortedArray: function() {
                function compare(a, b) {
                if (a.chapter < b.chapter)
                    return -1;
                if (a.chapter > b.chapter)
                    return 1;
                return 0;
                }

                return this.questions.sort(compare);
            }
        },
        mounted() {
            this.loadQuestions();
            console.log('Component mounted.')
        }
    }
</script>
