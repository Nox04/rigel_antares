<template>
  <div>
    <top-menu v-if="!isLoginPage" />
    <div id="main">
      <transition
        name="fade"
        mode="out-in"
      >
        <router-view />
      </transition>
    </div>
    <app-footer v-if="!isLoginPage" />
  </div>
</template>

<script>
import TopMenu from './shared/TopMenu.vue';
import AppFooter from './shared/AppFooter.vue';

export default {
  components: {
    'top-menu': TopMenu,
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