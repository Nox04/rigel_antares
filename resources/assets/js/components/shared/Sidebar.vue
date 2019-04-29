<template>
  <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
      <div class="kt-aside__brand-logo">
        <router-link :to="{name:'map'}" class="kt-menu__link ">
          <img alt="Logo" src="../../../static/images/logos/logo-light.png" />
        </router-link>
      </div>
    </div>
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
      <div id="kt_aside_menu" class="kt-aside-menu ">
        <ul class="kt-menu__nav ">
          <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
            <router-link :to="{name:'map'}" class="kt-menu__link ">
              <span class="kt-menu__link-icon"><i class="fa fa-map-marked-alt"></i></span>
              <span class="kt-menu__link-text">Mapa</span>
            </router-link>
          </li>
          <li class="kt-menu__section ">
            <h4 class="kt-menu__section-text">Gestión</h4>
            <i class="kt-menu__section-icon flaticon-more-v2"></i>
          </li>
          <li class="kt-menu__item" aria-haspopup="true">
            <router-link :to="{name:'messengers'}" class="kt-menu__link ">
              <span class="kt-menu__link-icon"><i class="fa fa-motorcycle"></i></span>
              <span class="kt-menu__link-text">Mensajeros</span>
            </router-link>
          </li>
          <li class="kt-menu__item" aria-haspopup="true">
            <router-link :to="{name:'rides'}" class="kt-menu__link ">
              <span class="kt-menu__link-icon"><i class="fa fa-route"></i></span>
              <span class="kt-menu__link-text">Domicilios</span>
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
