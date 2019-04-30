<template>
  <div class="row">
    <div class="col-xl-8 col-md-8">
      <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">
          <datatable />
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-4">
      <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datatable from '../controls/Datatable.vue';

export default {
  components: {
    'datatable': Datatable
  }
}
</script>
