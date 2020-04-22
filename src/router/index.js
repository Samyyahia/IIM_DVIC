import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '../views/Dashboard/Dashboard'
import Projects from '../views/Projects/Projects'
import ProjectCreate from '../views/ProjectCreate/ProjectCreate'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Dashboard,
    children: [
      {
        path: '',
        component: Projects
      },
      {
        path: 'projects',
        component: Projects
      },
      {
        path: 'create',
        component: ProjectCreate
      }
    ]
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
