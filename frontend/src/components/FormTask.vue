<template>
  <form v-on:submit.prevent=""  class="d-flex mb-4">
    <guestMessage v-if="message != ''" :message="message" />
    <input v-model="task" type="email" class="form-control" placeholder="Email" autofocus>
    <input v-model="outro" type="password" class="form-control" placeholder="Senha" >
    <button class="btn btn-lg btn-primary btn-block" type="submit">
        +</button>
  </form>
</template>
