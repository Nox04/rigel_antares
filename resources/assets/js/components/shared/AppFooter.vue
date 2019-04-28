<template>
  <footer>
    <hr>
    <div class="container">
      &copy;<span v-once>{{ siteName }}</span> <span v-once>{{ currentYear }},
        desarrollado por <a
          href="https://rigel.digital"
          target="_blank"
        >Rigel</a></span>
    </div>
  </footer>
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
