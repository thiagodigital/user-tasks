<template>
  <div id="app" class="container">
    <HeaderComponent />
    <router-view/>
  </div>
</template>

<script>
import HeaderComponent from '@/components/Header.vue'
export default {
  name: 'App',
  components: {
    HeaderComponent
  }
}
</script>
