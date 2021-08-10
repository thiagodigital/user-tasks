<template>
  <div class="py-4">
    <Header />
    <FormTask />
    <div v-if="loading">
      carregando
    </div>
    <div  v-else>
    <div v-if="tasks.length">
      <h6 class="text-muted mb-4">Olá {{ user ? user.name : '' }}<span class="tarefas">
          {{ tasks.length > 0 ?  'sua lista tem ' + tasks.length + ' Tarefas.' : ' você ainda não possui tarefas'}}
        </span>
      </h6>
      <CardTask v-if="tasks.length > 0" :data="tasks" />
    </div>
    </div>
  </div>
</template>

<script>
import API from '@/services/API'
import FormTask from '@/components/FormTask'
import Header from '@/components/Header'
import CardTask from '@/components/CardTask'

export default {
  components: {
    FormTask,
    Header,
    CardTask
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
      const headers = {
        'Content-Type': 'application/json',
        Authorization: 'bearer ' + window.localStorage.getItem('token')
      }
      this.loading = true
      API.get('/tasks', { headers: headers })
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
    this.loadTasks()
  }
}
</script>
