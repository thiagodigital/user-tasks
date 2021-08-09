<template>
  <div class="col-12">
    <div class="alert alert-danger" role="alert">
      <p class="mb-0" v-if="message.name">{{ message.name[0] }}</p>
      <p class="mb-0" v-if="message.email">{{ message.email[0] }}</p>
      <p class="mb-0" v-if="message.password">{{ message.password[0] }}</p>
      <p class="mb-0" v-if="message.message">{{ message.message[0] }}</p>
    </div>
  </div>
</template>
<script>
export default {
  props: ['message']
}
</script>
