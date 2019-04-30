<template>
  <div
    id="kt_header_mobile"
    class="kt-header-mobile  kt-header-mobile--fixed "
  >
    <div class="kt-header-mobile__logo">
      <router-link
        v-once
        class="navbar-brand"
        :to="{name: 'index'}"
      >
        <img
          alt="Logo"
          src="../../../static/images/logos/icon.png"
        >
        <img
          alt="Logo"
          src="../../../static/images/logos/logo-light.png"
        >
      </router-link>
    </div>
  </div>
</template>