import Vue from 'vue'
import VueRouter from 'vue-router'
// import { state } from '@/services/store'

Vue.use(VueRouter)

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

router.beforeEach((to, from, next) => {
  const user = JSON.parse(window.localStorage.getItem('user'))

  if (to.meta.requiresAuth) {
    if (!user) {
      next({ name: 'Login' })
    } else {
      next()
    }
  } else next()
})

export default router
