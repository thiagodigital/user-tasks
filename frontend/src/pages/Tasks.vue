<template>
  <div>
    <h1>Pagina de tarefas</h1>
    <div v-if="loading">
      carregando
    </div>
    <pre v-else>
      {{ tasks }}
    </pre>
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
      API.get('endpoint')
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
