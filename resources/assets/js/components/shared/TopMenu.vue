<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <router-link
        v-once
        class="navbar-brand"
        :to="{name: 'index'}"
      >
        {{ siteName }}
      </router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon" />
      </button>

      <div
        id="navbarSupportedContent"
        class="collapse navbar-collapse"
      >
        <ul class="navbar-nav ml-auto">
          <router-link
            v-show="isLoggedIn"
            :to="{name: 'map'}"
            tag="li"
            class="nav-item"
          >
            <a class="nav-link">Mapa</a>
          </router-link>
          <router-link
            v-show="isLoggedIn"
            :to="{name: 'profile'}"
            tag="li"
            class="nav-item"
          >
            <a class="nav-link">Perfil</a>
          </router-link>
          <li
            v-show="isLoggedIn"
            class="nav-item"
          >
            <a
              class="nav-link"
              href="#"
              @click.prevent="logout"
            >Cerrar sesión</a>
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
          this.$toastr('success', 'Sesión finalizada', '');
          this.$router.push({name: 'index'});
        });
    }
  }
}
</script>
