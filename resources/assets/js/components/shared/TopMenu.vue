<template>
  <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper"></div>
    <div class="kt-header__topbar">
      <!--begin: User Bar -->
      <div class="kt-header__topbar-item kt-header__topbar-item--user">
        <div class="kt-header__topbar-wrapper" @click="toggleMenu()">
          <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hola,</span>
            <span class="kt-header__topbar-username kt-hidden-mobile">Juan</span>
            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">J</span>
          </div>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl" :class="dynamicClass">
          <!--begin: Head -->
          <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x card-background">
            <div class="kt-user-card__avatar">
              <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">J</span>
            </div>
            <div class="kt-user-card__name">
              Juan David
            </div>
          </div>
          <div class="kt-notification">
            <a href="#" class="kt-notification__item">
              <div class="kt-notification__item-icon">
                <i class="flaticon2-calendar-3 kt-font-success"></i>
              </div>
              <div class="kt-notification__item-details">
                <div class="kt-notification__item-title kt-font-bold">
                  Mi perfil
                </div>
                <div class="kt-notification__item-time">
                  Configuración de la cuenta y más.
                </div>
              </div>
            </a>
            <div class="kt-notification__custom kt-space-between">
              <a href="demo1/custom/user/login-v2.html" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Cerrar sesión</a>
            </div>
          </div>
        </div>
      </div>

      <!--end: User Bar -->
    </div>
    <!-- end:: Header Topbar -->
  </div>

  <!-- end:: Header -->
  <!--nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
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
  </nav-->
</template>

<script>
import {siteName} from './../../config';
import {mapGetters} from 'vuex';
import jwtToken from '../../helpers/jwt-token';

export default {
  data() {
    return {
      siteName: siteName,
      menuIsOpen: false
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
    },
    toggleMenu() {
      this.menuIsOpen = !this.menuIsOpen;
    }
  }, computed: {
    dynamicClass() {
      if(this.menuIsOpen)
        return 'showDropDown';
      else
        return '';
    }
  },
}
</script>
<style>
.showDropDown {
  display: block;
  position: absolute; 
  will-change: transform; 
  top: 0px; 
  left: 0px; 
  transform: translate3d(calc(100vw - 660px), 64px, 0px);
}
.card-background {
  background-image: url(../../../static/images/misc/bg-1.jpg);
}
</style>
