<template>
  <form>
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" v-model="nome" />
    <label for="email">Email</label>
    <input type="text" name="email" id="email" v-model="email" />
    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha" v-model="senha" />
    <label for="cep">Cep</label>
    <input
      type="text"
      name="cep"
      id="cep"
      @keyup="preencherCep"
      v-model="cep"
    />
    <label for="logradouro">Logradouro</label>
    <input type="text" name="logradouro" id="logradouro" v-model="logradouro" />
    <label for="numero">Numero</label>
    <input type="text" name="numero" id="numero" v-model="numero" />
    <label for="bairro">Bairro</label>
    <input type="text" name="bairro" id="bairro" v-model="bairro" />
    <label for="cidade">Cidade</label>
    <input type="text" name="cidade" id="cidade" v-model="cidade" />
    <label for="estado">Estado</label>
    <input type="text" name="estado" id="estado" v-model="estado" />
    <div class="button">
      <slot />
    </div>
  </form>
</template>

<script>
  import { mapFields } from '@/helpers.js';
  import { getCep } from '@/services.js';

  export default {
    computed: {
      ...mapFields({
        fields: [
          'nome',
          'email',
          'senha',
          'logradouro',
          'cep',
          'numero',
          'bairro',
          'cidade',
          'estado',
        ],
        base: 'usuario',
        mutation: 'UPDATE_USUARIO',
      }),
    },
    methods: {
      preencherCep() {
        const cep = this.cep.replace(/\D/g, '');
        if (cep.length === 8) {
          getCep(cep).then(res => {
            this.logradouro = res.data.logradouro;
            this.bairro = res.data.bairro;
            this.cidade = res.data.localidade;
            this.estado = res.data.uf;
          });
        }
      },
    },
  };
</script>

<style scoped>
  form {
    display: grid;
    grid-template-columns: 80px 1fr;
    align-items: center;
  }

  .button {
    grid-column: 2;
    margin-top: 10px;
  }
</style>
