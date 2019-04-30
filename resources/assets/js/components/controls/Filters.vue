<template>
  <div class="row align-items-center">
    <div class="col-md-8 kt-margin-b-20-tablet-and-mobile">
      <div class="kt-input-icon kt-input-icon--left">
        <input type="text" v-model="filterText" class="form-control" @keyup.enter="doFilter"placeholder="Buscar..." id="generalSearch">
        <span class="kt-input-icon__icon kt-input-icon__icon--left">
          <span><i class="la la-search"></i></span>
        </span>
      </div>
    </div>
    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
      <div class="kt-form__group kt-form__group--inline">
        <div class="kt-form__control">
          <select class="form-control bootstrap-select">
            <option value="">Todos</option>
            <option value="1">Activos</option>
            <option value="2">Inactivos</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      filterText: ''
    }
  },
  methods: {
    doFilter () {
      console.log('doFilter:', this.filterText)
    }
  }
}
</script>