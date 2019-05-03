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
      <dropdown
      :username="username"
      @logout="logout"
      />
    </div>
  </div>
</template>

<script>
import {siteName} from './../../config';
import {mapGetters} from 'vuex';
import Dropdown from './Dropdown';

export default {
  components: {
    'dropdown': Dropdown,
  },
  data() {
    return {
      siteName: siteName
    }
  },
  computed: {
    ...mapGetters([
      'isLoggedIn',
      'username'
    ])
  },
  methods: {
    logout() {
      this.$auth.logout({
        success: res => {
          this.$store.dispatch('unsetAuthUser')
          .then(() => {
            this.$toastr('success', 'Sesión finalizada', '');
            this.$router.push({name: 'index'});
          });
        },
        error: () => {
          this.has_error = true;
        },
        rememberMe: true,
        fetchUser: true
      });
    }
  }
}
</script>
