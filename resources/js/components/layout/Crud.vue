<template>
  <div class="row">
    <div class="col-xl-8 col-md-8">
      <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
          <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
              <i :class="['kt-font-brand fa', icon]"></i>
            </span>
            <h3 class="kt-portlet__head-title">
              {{title}}
              <small>{{desc}}</small>
            </h3>
          </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit internal-padding">
          <datatable
          :end-point="endPoint"
          />
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-4">
      <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              Crear nuevos {{title.toLowerCase()}}
            </h3>
          </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit internal-padding">
          <data-form :fields="fields" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datatable from '../controls/Datatable.vue';
import Form from '../controls/form/Form.vue';

export default {
  props: ['title', 'desc', 'icon', 'endPoint', 'fields'],
  components: {
    'datatable': Datatable,
    'data-form': Form
  }
}
</script>

<style scoped>
.internal-padding {
  margin-left: 20px;
  margin-right: 20px;
}
</style>
