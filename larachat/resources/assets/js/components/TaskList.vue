<template>
    <div>
        <h3 v-text="project.name"></h3>
        <ul>
            <li class="list-group" v-for="task in project.tasks" :key="task.id" v-text="task.body"></li>
        </ul>

        <input class="form-control" type="text" placeholder="New Task" v-model="newTask" @blur="save">
    </div>
</template>

<script>
    export default {
        props: ["data-project"],
        data() {
            return{
                project: this.dataProject,
                newTask: ''
            };
        },
        created(){
            window.Echo.private('tasks.' +this.project.id)
            .listen('TaskCreated', ({ task }) => { this.addTask(task) });
        },
        methods: {
            save(){
                axios.post(`/api/projects/${this.project.id}/tasks`, { body: this.newTask})
                .then(response => response.data)
                .then(this.addTask);
            },
            addTask(task){
                this.project.tasks.push(task);

                this.newTask = '';
            }
        }
    }
</script>
