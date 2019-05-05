<template>
  <div class="kt-portlet kt-portlet--mobile" style="overflow-y: scroll;">
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="kt-notification">
        <a href="#" v-for="n in 20" class="kt-notification__item">
          <div class="kt-notification__item-icon">
            <i class="fa fa-box kt-font-danger"></i>
          </div>
          <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
              Envío #{{21 - n}}
            </div>
            <div class="kt-notification__item-time">
              Hace {{n*2}} minutos
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>

