<template>
  <div>
    <h1>Tarefas</h1>
    <div v-if="loading">
      carregando
    </div>
    <div  v-else>

     <div v-for="task in tasks" class="card" :key="task.id">
        <div class="card-body">
          {{ task.title }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import API from '@/services/API'

export default {
  data: function () {
    return {
      loading: true,
      tasks: []
    }
  },
  methods: {
    loadTasks () {
      this.loading = true
      API.get('/tasks')
        .then(({ data }) => {
          this.tasks = data.data
          this.loading = false
        })
        .catch(res => {
          console.log(res)
          this.loading = false
        })
    }
  },
  mounted () {
    console.log('rodando')
    this.loadTasks()
  }
}
</script>
