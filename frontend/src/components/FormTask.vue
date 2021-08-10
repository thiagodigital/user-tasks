<template>
<div>
    <GuestMessage v-if="message != ''" :message="message" />
  <form v-on:submit.prevent=""  class="mb-4 p-4 bg-primary row">
    <div class="col-12 mb-3">
      <input v-model="form.task" type="string" class="form-control" placeholder="Tarefa" autofocus>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <select  class="form-select" aria-label="Default select example" v-model="form.label">
            <option disabled selected value="">Categoria</option>
            <option value="0">Pessoal</option>
            <option value="1">Profissional</option>
            <option value="2">Outros</option>
          </select>
        </div>
        <div class="col-4">
          <input  type="date" class="form-control" placeholder="Senha" v-model="form.date">
        </div>
        <div class="col-4">
          <button class="btn btn-success col-12" type="submit"> + Nova Tarefa</button>
        </div>
      </div>
    </div>
  </form>
</div>
</template>
<script>
import GuestMessage from '@/components/GuestMessage.vue'

export default {
  components: {
    GuestMessage
  },
  data () {
    return {
      form: {
        task: '',
        label: '',
        date: null
      },
      message: ''
    }
  }
}
</script>
