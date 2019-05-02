<template>
  <div class="row align-items-center">
    <div class="col-md-12 kt-margin-b-20-tablet-and-mobile">
      <div class="kt-input-icon kt-input-icon--left">
        <input type="text" v-model="filterText" class="form-control" @keyup="doFilter"placeholder="Buscar..." id="generalSearch">
        <span class="kt-input-icon__icon kt-input-icon__icon--left">
          <span><i class="la la-search"></i></span>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import {mapGetters} from 'vuex';
import _ from 'lodash';

export default {
  data () {
    return {
      filterText: '',
    }
  },
  methods: {
    doFilter: _.debounce(function() {
      this.$store.dispatch('setFilterText', this.filterText);
    }, 400)
  },
  computed: {
    ...mapGetters([
      'textInBar'
    ])
  }
}
</script>