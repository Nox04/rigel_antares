<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <router-link class="navbar-brand" :to="{name: 'index'}" v-once>{{ siteName }}</router-link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <router-link v-show="isLoggedIn" :to="{name: 'map'}" tag="li" class="nav-item">
            <a class="nav-link">Mapa</a>
          </router-link>
          <router-link v-show="isLoggedIn" :to="{name: 'profile'}" tag="li" class="nav-item">
            <a class="nav-link">Perfil</a>
          </router-link>
          <li class="nav-item" v-show="isLoggedIn">
            <a class="nav-link" href="#" @click.prevent="logout">Cerrar sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import {siteName} from './../../config';
import {mapGetters} from 'vuex';
import jwtToken from '../../helpers/jwt-token';

export default {
  data() {
    return {
      siteName: siteName
    }
  },
  computed: mapGetters([
    'isLoggedIn'
  ]),
  methods: {
    logout() {
      jwtToken.removeToken();
      this.$store.dispatch('unsetAuthUser')
        .then(() => {
          this.$noty.success('Cerraste sesión con éxito');
          this.$router.push({name: 'index'});
        });
    }
  }
}
</script>
