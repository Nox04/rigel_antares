<template>
  <div class="row align-items-center">
    <div class="col-md-8 kt-margin-b-20-tablet-and-mobile">
      <div class="kt-input-icon kt-input-icon--left">
        <input
          v-model="filters.name"
          type="text"
          class="form-control"
          placeholder="Nombre..."
          @keyup="doFilter"
        >
        <span class="kt-input-icon__icon kt-input-icon__icon--left">
          <span><i class="la la-search" /></span>
        </span>
      </div>
    </div>
    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
      <div class="kt-form__group kt-form__group--inline">
        <div class="kt-form__control">
          <select
            v-model="filters.enabled"
            class="form-control bootstrap-select"
            @change="doFilterNoWait"
          >
            <option value="">
              Todos
            </option>
            <option value="1">
              Activos
            </option>
            <option value="0">
              Inactivos
            </option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import _ from 'lodash';

export default {
  data () {
    return {
      filters: {
        name: '',
        enabled: ''
      }
    }
  },
  methods: {
    doFilter: _.debounce(function() {
      this.$emit('changedFilters', this.filters);
    }, 200),
    doFilterNoWait () {
      this.$emit('changedFilters', this.filters);
    }
  }
}
</script>
