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
          :to="{name:'map'}"
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
            class="kt-menu__item  kt-menu__item--active"
            aria-haspopup="true"
          >
            <router-link
              :to="{name:'map'}"
              class="kt-menu__link "
            >
              <span class="kt-menu__link-icon"><i class="fa fa-map-marked-alt" /></span>
              <span class="kt-menu__link-text">Mapa</span>
            </router-link>
          </li>
          <li class="kt-menu__section ">
            <h4 class="kt-menu__section-text">
              Gestión
            </h4>
            <i class="kt-menu__section-icon flaticon-more-v2" />
          </li>
          <li
            class="kt-menu__item"
            aria-haspopup="true"
          >
            <router-link
              :to="{name:'messengers'}"
              class="kt-menu__link "
            >
              <span class="kt-menu__link-icon"><i class="fa fa-motorcycle" /></span>
              <span class="kt-menu__link-text">Mensajeros</span>
            </router-link>
          </li>
          <li
            class="kt-menu__item"
            aria-haspopup="true"
          >
            <router-link
              :to="{name:'rides'}"
              class="kt-menu__link "
            >
              <span class="kt-menu__link-icon"><i class="fa fa-route" /></span>
              <span class="kt-menu__link-text">Domicilios</span>
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
