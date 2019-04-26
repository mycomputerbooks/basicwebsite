<template>
    <div>
        <button @click="loadCreateModal" class="btn btn-primary btn-block">Add New task</button>
        <table class="table" v-if="tasks">
        <!-- <table class="table">   -->
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr v-for="(task, index) in tasks"> -->
                <tr v-for="(task, index) in sortedArray">
                    <td>{{index + 1}}</td>
                    <td>{{task.name}}</td>
                    <td>{{task.body}}</td>
                    <td><button @click="loadUpdateModal(index)" class="btn btn-info">Edit</button></td>
                    <td><button @click=deleteTask(index) class="btn btn-danger">Delete</button></td>
                </tr>
            </tbody>
        </table>

        <!-- Create Modal -->
        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <h1>MODAL Works</h1> -->
                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{error}}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input v-model="task.name" type="text" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input v-model="task.body" type="text" id="description" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="createTask" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
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
                            <label for="name">Name</label>
                            <input v-model="new_update_task.name" type="text" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input v-model="new_update_task.body" type="text" id="description" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="updateTask" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        data(){

            return {

                task:{
                    name: '',
                    body: ''
                },
                tasks: [],
                uri: 'http://basicsite:8888/tasks',
                errors: [],
                new_update_task: [],
                toastr: toastr.options = {"positionClass": "toast-bottom-full-width"}
                // toastr: toastr.options = {
                // "debug": false,
                // "positionClass": "toast-bottom-full-width",
                // "onclick": null,
                // "fadeIn": 300,
                // "fadeOut": 1000,
                // "timeOut": 5000,
                // "extendedTimeOut": 1000
                // }
            }
        },
        methods: {

            loadCreateModal(){
                $("#create-modal").modal("show");
            },

            loadUpdateModal(index){

                this.errors = [];
                $("#update-modal").modal("show");
                this.new_update_task = this.tasks[index];

            },

            createTask(){
                axios.post(this.uri, {name: this.task.name, body: this.task.body})

                .then(response=>{

                    this.tasks.push(response.data.task);

                    this.resetData();
                    $("#create-modal").modal("hide");

                     toastr.success(response.data.message);
                    //toastr.success('eat cheese or die');

                })

                .catch(error=>{
                    //console.log(error)
                    this.errors = [];

                    if(error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0]);

                    }

                    if(error.response.data.errors.body){
                        this.errors.push(error.response.data.errors.body[0]);

                    }

                });

            },

            updateTask(){

               axios.patch(this.uri + "/" + this.new_update_task.id, {

                   name: this.new_update_task.name,
                   body: this.new_update_task.body,

               }).then(response =>{

                   $("#update-modal").modal("hide");
                    //toastr.success(response.data.message);

               }).catch(error=>{
                    //console.log(error)
                    if(error.response.data.errors.name){
                    this.errors.push(error.response.data.errors.name[0]);

                    }

                    if(error.response.data.errors.body){
                        this.errors.push(error.response.data.errors.body[0]);

                    }

                });

            },

            deleteTask(index){

                let confirmBox = confirm("Do you really want to delete this?");

                if(confirmBox == true){

                    axios.delete(this.uri + "/" + this.tasks[index].id)
                            .then(response=>{

                              this.$delete(this.tasks, index);
                               //toastr.success(response.data.message);


                          }).catch(error=>{

                         console.log("Could not delete for some reason")
                    });

                }


            },

            loadTasks(){

                axios.get(this.uri).then(response=>{

                    this.tasks = response.data.tasks;

                });

            },

            resetData(){

                this.task.name = '';
                this.task.body = '';

            }
        },
        computed: {
            sortedArray: function() {
                function compare(a, b) {
                if (a.name < b.name)
                    return -1;
                if (a.name > b.name)
                    return 1;
                return 0;
                }

                return this.tasks.sort(compare);
            }
        },
        mounted() {
            this.loadTasks();
            console.log('Component mounted.')
            // console.log(this.tasks.name);

        }
    }
</script>
