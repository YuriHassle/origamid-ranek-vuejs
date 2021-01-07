import Vue from 'vue';
import Vuex from 'vuex';
import { api } from '@/services.js';

Vue.use(Vuex);
export default new Vuex.Store({
  strict: true,
  state: {
    login: false,
    usuario: {
      id: '',
      nome: '',
      email: '',
      senha: '',
      cep: '',
      logradouro: '',
      numero: '',
      bairro: '',
      cidade: '',
      estado: '',
    },
    usuario_produtos: null,
  },
  mutations: {
    UPDATE_LOGIN(state, payload) {
      state.login = payload;
    },
    UPDATE_USUARIO(state, payload) {
      state.usuario = Object.assign(state.usuario, payload);
    },
    UPDATE_USUARIO_PRODUTOS(state, payload) {
      state.usuario_produtos = payload;
    },
    ADD_USARIO_PRODUTOS(state, payload) {
      state.usuario_produtos.unshift(payload);
    },
  },
  actions: {
    getUsuarioProdutos(context) {
      api.get(`/product?usuario_id=${context.state.usuario.id}`).then(res => {
        context.commit('UPDATE_USUARIO_PRODUTOS', res.data);
      });
    },
    getUsuario(context, payload) {
      return api.get(`/users/${payload}`).then(res => {
        context.commit('UPDATE_USUARIO', res.data);
        context.commit('UPDATE_LOGIN', true);
      });
    },
    criarUsuario(context, payload) {
      context.commit('UPDATE_USUARIO', { id: payload.email });
      return api.post('/users', payload);
    },
    deslogarUsuario(context) {
      context.commit('UPDATE_USUARIO', {
        id: '',
        nome: '',
        email: '',
        senha: '',
        cep: '',
        logradouro: '',
        numero: '',
        bairro: '',
        cidade: '',
        estado: '',
      });
      context.commit('UPDATE_LOGIN', false);
    },
  },
  modules: {},
});
