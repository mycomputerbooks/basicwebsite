<template>
    <div id="string">
        <ul>
            <li v-for="array in sortedArray">{{ array.name }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                uri: 'http://basicsite:8888/tasks',
                tasks: [],
                arrays: [{
                    name: 'sonya',
                    sex: 'woman'
                    }, {
                    name: 'sindell',
                    sex: 'woman'
                    }, {
                    name: 'kano',
                    sex: 'man'
                    }, {
                    name: 'aaron',
                    sex: 'man'
                    }, {
                    name: 'subzero',
                    sex: 'man'
                    }]

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
        methods: {
            loadTasks(){

                axios.get(this.uri).then(response=>{

                    this.tasks = response.data.tasks;

                });

            }

        },
        mounted() {
            this.loadTasks();
        }

    }
</script>
