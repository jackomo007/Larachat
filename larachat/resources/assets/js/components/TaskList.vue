<template>
  <div>
    <h3 v-text="project.name"></h3>
    <ul>
      <li class="list-group" v-for="task in project.tasks" :key="task.id" v-text="task.body"></li>
    </ul>

    <input
      class="form-control"
      type="text"
      placeholder="Write here your message..."
      v-model="newTask"
      @blur="save"
      @keydown="tagPeers"
    />
    <span v-if="activePeer" v-text="activePeer.name+ ' is typing...'"></span>
  </div>
</template>

<script>
export default {
  props: ["data-project"],
  data() {
    return {
      project: this.dataProject,
      newTask: "",
      activePeer: false,
      typingTimer: false
    };
  },
  computed: {
    channel() {
      return window.Echo.private("tasks." + this.project.id);
    }
  },
  created() {
    this.channel
      .listen("TaskCreated", ({ task }) => this.addTask(task))
      .listenForWhisper("typing", this.flashActivePeer);
  },
  methods: {
    flashActivePeer(e) {
      this.activePeer = e;

      if (this.typingTimer) clearTimeout(this.typingTimer);

      this.typingTimer = setTimeout(() => (this.activePeer = false), 3000);
    },
    tagPeers() {
      this.channel.whisper("typing", {
        name: window.App.user.name
      });
    },
    save() {
      axios
        .post(`/api/projects/${this.project.id}/tasks`, { body: this.newTask })
        .then(response => response.data)
        .then(this.addTask);
    },
    addTask(task) {
      this.activePeer = false;
      this.project.tasks.push(task);

      this.newTask = "";
    }
  }
};
</script>
