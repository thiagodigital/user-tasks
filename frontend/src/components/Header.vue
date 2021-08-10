<template>
  <div class="d-flex justify-content-between align-items-end mb-4">
    <div class="brand">Task<span>in</span></div>
    <div class="d-flex justify-content-between align-items-end">
      <router-link to="/tasks" class="btn" v-on:click="logout()">
        <img src="../assets/icons/task.svg" alt="" />
        <span class="mx-1">Tarefas</span>
      </router-link>
      <router-link to="/profile" class="btn" v-on:click="logout()">
        <img src="../assets/icons/user.svg" alt="" />
        <span class="mx-1">Perfil</span>
      </router-link>
      <button type="button" class="btn btn-small btn-danger" v-on:click="logout()">
        <img src="../assets/icons/logout.svg" alt="" />
        <span class="mx-1">sair</span>
      </button>
    </div>
  </div>
</template>
<script>
import API from '@/services/API'

export default {
  data () {
    return {
      token: null
    }
  },
  mounted () {
    this.token = window.localStorage.getItem('token')
  },
  methods: {
    logout () {
      var headers = {
        Authorization: ('bearer ' + window.localStorage.getItem('token'))
      }
      API.post('auth/logout', '', { headers: headers })
        .then((res) => {
          window.localStorage.removeItem('user')
          window.localStorage.removeItem('token')
          this.$router.push('/login')
        })
    }
  }
}
</script>
