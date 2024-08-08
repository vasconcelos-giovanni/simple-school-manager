import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import ClassroomsView from '@/views/ClassroomsView.vue';
import StudentsView from '@/views/StudentsView.vue';
import ClassroomStudentsView from '@/views/ClassroomStudentsView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/turmas',
      name: 'classrooms',
      component: ClassroomsView
    },
    {
      path: '/alunos',
      name: 'students',
      component: StudentsView,
      props: true
    },
    {
      path: '/turmas/:turmaId/alunos',
      name: 'classroom.students',
      component: ClassroomStudentsView,
      props: true
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
});

export default router;
