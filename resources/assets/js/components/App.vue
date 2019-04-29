<template>
  <div>
    <top-mobile v-if="!isLoginPage" />
    <transition
      name="fade"
      mode="out-in"
    >
      <div
        v-if="!isLoginPage"
        class="kt-grid kt-grid--hor kt-grid--root"
      >
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
          <sidebar />
          <div
            id="kt_wrapper"
            class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper"
          >
            <top-menu />
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
              <div
                id="kt_content"
                class="kt-grid__item kt-grid__item--fluid"
              >
                <div id="main">
                  <transition
                    name="fade"
                    mode="out-in"
                  >
                    <router-view />
                  </transition>
                </div>
              </div>
            </div>
            <app-footer />
          </div>
        </div>
      </div>
    </transition>
    <transition
      name="fade"
      mode="out-in"
    >
      <home v-if="isLoginPage" />
    </transition>
  </div>
</template>

<script>
import TopMenu from './shared/TopMenu.vue';
import TopMobile from './shared/TopMobile.vue';
import Sidebar from './shared/Sidebar.vue';
import AppFooter from './shared/AppFooter.vue';
import Home from './home/Home.vue';

export default {
  components: {
    'top-menu': TopMenu,
    'top-mobile': TopMobile,
    'home': Home,
    'sidebar': Sidebar,
    'app-footer': AppFooter
  },
  computed: {
    isLoginPage() {
      return this.$route.name === 'index';
    }
  },
}
</script>
<style lang="css">
#main {
  min-height: calc(100vh - 125px);
}
</style>