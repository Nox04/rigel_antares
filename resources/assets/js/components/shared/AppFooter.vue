<template>
  <div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
    <div class="kt-footer__copyright">
      &copy;<span v-once>{{ siteName }} </span> <span v-once>{{ currentYear }},
        desarrollado por <a
          href="https://rigel.digital"
          target="_blank"
          class="kt-link"
        >Rigel</a></span>
    </div>
    <div class="kt-footer__menu">
      <a
        href="http://keenthemes.com/metronic"
        target="_blank"
        class="kt-footer__menu-link kt-link"
      >Contacto</a>
    </div>
  </div>
</template>

<script>
import {siteName} from '../../config';

export default {
  data() {
    return {
      siteName: siteName,
      currentYear: (new Date).getFullYear()
    }
  }
}
</script>
