import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home';
import Produto from '../views/Produto';
import Login from '../views/Login';
import Usuario from '../views/usuario/Usuario';

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior(){
    return window.scrollTo({top:0, behavior: 'smooth'})
  },
  routes: [
    {
      name: 'home',
      path: '/',
      component: Home,
    },
    {
      name:'produto',
      path: '/produto/:id',
      component: Produto,
      props: true,
    },
    {
      name: 'login',
      path: '/login',
      component: Login,
    },
    {
      name: 'usuario',
      path: '/usuario',
      component: Usuario,
    },
  ]
});

export default router;
