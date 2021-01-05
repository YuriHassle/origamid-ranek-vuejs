import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home';
import Produto from '../views/Produto';
import Login from '../views/Login';
import Usuario from '../views/usuario/Usuario';
import UsuarioProdutos from '../views/usuario/UsuarioProdutos';
import UsuarioEditar from '../views/usuario/UsuarioEditar';
import UsuarioCompras from '../views/usuario/UsuarioCompras';
import UsuarioVendas from '../views/usuario/UsuarioVendas';

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior() {
    return window.scrollTo({ top: 0, behavior: 'smooth' });
  },
  routes: [
    {
      name: 'home',
      path: '/',
      component: Home,
    },
    {
      name: 'produto',
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
      path: '/usuario',
      component: Usuario,
      children: [
        {
          name: 'usuario',
          path: '/',
          component: UsuarioProdutos,
        },
        {
          name: 'compras',
          path: 'compras',
          component: UsuarioCompras,
        },
        {
          name: 'vendas',
          path: 'vendas',
          component: UsuarioVendas,
        },
        {
          name: 'usuario-editar',
          path: 'editar',
          component: UsuarioEditar,
        },
      ],
    },
  ],
});

export default router;
