<template>
  <div
    id="kt_header"
    class="kt-header kt-grid__item  kt-header--fixed "
  >
    <div
      id="kt_header_menu_wrapper"
      class="kt-header-menu-wrapper"
    />
    <div class="kt-header__topbar">
      <div class="kt-header__topbar-item kt-header__topbar-item--user">
        <div
          class="kt-header__topbar-wrapper"
          @click="toggleMenu()"
        >
          <div class="kt-header__topbar-user">
            <span class="kt-header__topbar-welcome kt-hidden-mobile">Hola,</span>
            <span class="kt-header__topbar-username kt-hidden-mobile">{{ username }}</span>
            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{ username.charAt(0) }}</span>
          </div>
        </div>
        <div
          class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl"
          :class="dynamicClass"
          @click="toggleMenu()"
        >
          <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x card-background">
            <div class="kt-user-card__avatar">
              <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{ username.charAt(0) }}</span>
            </div>
            <div class="kt-user-card__name">
              {{ username }}
            </div>
          </div>
          <div class="kt-notification">
            <router-link
              :to="{name:'profile'}"
              class="kt-notification__item"
            >
              <div class="kt-notification__item-icon">
                <i class="flaticon2-calendar-3 kt-font-success" />
              </div>
              <div class="kt-notification__item-details">
                <div class="kt-notification__item-title kt-font-bold">
                  Mi perfil
                </div>
                <div class="kt-notification__item-time">
                  Configuración de la cuenta y más.
                </div>
              </div>
            </router-link>
            <div class="kt-notification__custom kt-space-between">
              <a
                href="#"
                class="btn btn-label btn-label-brand btn-sm btn-bold"
                @click.prevent="logout"
              >Cerrar sesión</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
  computed: {
    ...mapGetters([
      'isLoggedIn',
      'username'
    ]),
    dynamicClass() {
      if(this.menuIsOpen)
        return 'showDropDown';
      else
        return '';
    }
  },
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
  }
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
