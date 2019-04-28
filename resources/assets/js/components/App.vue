<template>
	<div>
		<top-menu></top-menu>
    <div id="main">
      <transition name="fade" mode="out-in">
        <router-view></router-view>
      </transition>
    </div>
		<app-footer></app-footer>
	</div>
</template>

<script>
	import TopMenu from './shared/TopMenu.vue';
	import AppFooter from './shared/AppFooter.vue';

	export default {
		components: {
			'top-menu': TopMenu,
			'app-footer': AppFooter
		}
	}
</script>
<style lang="css">
#main {
  min-height: calc(100vh - 150px);
}
</style>