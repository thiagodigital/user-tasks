<template>
    <div class="row d-flex justify-content-center align-items-center form-block">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall text-center">
                <div class="brand">Task<span>in</span></div>
                <form v-on:submit.prevent="makeLogin()"  class="form-signin">
                  <h1 class="form-title">Entrar no sistema</h1>
                  <guestMessage v-if="message != ''" :message="message" />
                <input v-model="form.email" type="email" class="form-control" placeholder="Email" autofocus>
                <input v-model="form.password" type="password" class="form-control" placeholder="Senha" >
                <button class="btn btn-lg btn-primary btn-block col-12" type="submit">
                    Login</button>
                </form>
                <span class="new-account mb-3">
                  Para criar uma conta
                  <router-link class="text-center " to="/register">clique aqui</router-link>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
import API from '@/services/API'
import GuestMessage from '@/components/GuestMessage.vue'

export default {
  components: { GuestMessage },
  data () {
    return {
      form: {
        email: '',
        password: ''
      },
      message: ''
    }
  },
  methods: {
    makeLogin () {
      API.post('auth/login', this.form)
        .then(({ data }) => {
          this.message = ''
          console.log('asdasds', data)
        })
        .catch(({ response }) => {
          const status = response.status
          const data = response.data
          if (status === 422) {
            this.message = data
            console.log(this.message, status)
          } else if (status === 401) {
            this.message = data
            console.log(this.message, status)
          }
        })
    }
  }
}
</script>
