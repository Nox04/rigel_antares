<template>
  <div
    id="kt_aside"
    class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
  >
    <div
      id="kt_aside_brand"
      class="kt-aside__brand kt-grid__item "
    >
      <div class="kt-aside__brand-logo">
        <router-link
          :to="{name:'map.ridesPanel'}"
          class="kt-menu__link "
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
    <div
      id="kt_aside_menu_wrapper"
      class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid"
    >
      <div
        id="kt_aside_menu"
        class="kt-aside-menu "
      >
        <ul class="kt-menu__nav ">
          <li
            v-for="(m, index) in menu"
            :key="index"
            aria-haspopup="true"
            :class="[{'kt-menu__item' : m.url !== null},{'kt-menu__section' : m.url === null}, {'kt-menu__item--active': $route.name === m.url}]"
          >
            <router-link
              v-if="m.url !== null"
              :to="{name: m.url}"
              class="kt-menu__link"
            >
              <span class="kt-menu__link-icon"><i :class="['fa', m.icon]" /></span>
              <span class="kt-menu__link-text">{{ m.name }}</span>
            </router-link>
            <template v-else>
              <h4 class="kt-menu__section-text">
                {{ m.name }}
              </h4>
              <i class="kt-menu__section-icon flaticon-more-v2" />
            </template>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import {menu} from '../../config';
export default {
  data() {
    return {
      menu
    }
  },
}
</script>
