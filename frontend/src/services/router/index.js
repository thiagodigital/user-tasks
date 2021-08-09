import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
// var isAuthenticated = false
const routes = [
  {
    path: '/',
    name: 'Home'
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('@/pages/guest/Login.vue')
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import('@/pages/guest/Register.vue')
  },
  {
    path: '/tasks',
    name: 'Task',
    component: () => import('@/pages/auth/Tasks.vue'),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/profile',
    name: 'Profile',
    component: () => import('@/pages/auth/Profile.vue'),
    meta: {
      requiresAuth: true
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

// router.beforeEach((to, from, next) => {
//   if (to.name !== 'Login' && !isAuthenticated) next({ name: 'Login' })
//   else next()
// })

export default router
