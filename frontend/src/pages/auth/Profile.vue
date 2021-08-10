<template>
  <div class="py-4">
    <Header />
    <div v-if="user">
      <span>Olá,</span>
      <h1>{{ user.name }}</h1>
      <p>email: {{ user.email }}</p>
    </div>
  </div>
</template>

<script>
import Header from '@/components/Header'

export default {
  components: {
    Header
  },
  data () {
    return {
      user: null
    }
  },
  mounted () {
    this.user = JSON.parse(window.localStorage.getItem('user'))
  }
}
</script>
