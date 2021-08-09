<template>
  <div class="py-4">
    <div class="d-flex justify-content-between align-items-end mb-4">
      <div class="brand">Task<span>in</span></div>
      <div class="d-flex justify-content-between align-items-end">
        <button type="button" class="btn btn-link text-danger">Sair</button>
      </div>
    </div>
    <FormTask />
    <div>
      <h6 class="text-muted mb-4">Olá {{ user ? user.name : '' }}, <span class="tarefas"> essa é sua lista de Tarefas.</span></h6>
    </div>
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
import FormTask from '@/components/FormTask'

export default {
  components: {
    FormTask
  },
  data () {
    return {
      loading: true,
      tasks: [],
      user: null
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
    this.user = JSON.parse(window.localStorage.getItem('user'))
    console.log('rodando')
    this.loadTasks()
  }
}
</script>
