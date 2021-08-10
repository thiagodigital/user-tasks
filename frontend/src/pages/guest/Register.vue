<template>
    <div class="row d-flex justify-content-center align-items-center form-block">
        <div class="col-sm-6 col-md-8 col-lg-6 col-md-offset-4">
            <div class="account-wall text-center">
                <div class="brand">Task<span>in</span></div>
                <form v-on:submit.prevent="makeRegister()" class="form-signin">
                  <h1 class="form-title">Criar uma conta</h1>
                  <guestMessage v-if="message != null" :message="message" />
                    <input v-model="form.name" type="text" class="form-control" placeholder="Nome" autofocus>
                    <input v-model="form.email" type="email" class="form-control" placeholder="Email">
                    <input v-model="form.password" type="password" class="form-control" placeholder="Senha">
                    <input v-model="form.password_confirmation" type="password" class="form-control" placeholder="Repetir Senha">
                    <button class="btn btn-lg btn-primary btn-block col-12" type="submit">
                      Registrar-se
                    </button>
                </form>
                <span class="new-account mb-3">
                  Já tem uma conta?
                  <router-link class="text-center " to="/login">Faça login</router-link>
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
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      },
      message: null
    }
  },
  methods: {
    makeRegister () {
      API.post('auth/register', this.form)
        .then(({ data }) => {
          this.message = data.message
          setTimeout(this.$router.push('/login'), 3000)
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
