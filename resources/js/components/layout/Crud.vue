<template>
  <div class="row">
    <div :class="[hasForm ? 'col-xl-8 col-md-8' : 'col-xl-12 col-md-12']">
      <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
          <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
              <i :class="['kt-font-brand fa', icon]" />
            </span>
            <h3 class="kt-portlet__head-title">
              {{ title }}
              <small>{{ desc }}</small>
            </h3>
          </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit internal-padding">
          <datatable
            ref="datatable"
            :end-point="endPoint"
          />
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-4" v-show="hasForm">
      <data-form
        :fields="fields"
        :title="title"
        @needRefresh="refreshDatatable"
      />
    </div>
  </div>
</template>

<script>
import Datatable from '../controls/Datatable.vue';
import Form from '../controls/form/Form.vue';

export default {
  components: {
    'datatable': Datatable,
    'data-form': Form
  },
  props: ['title', 'desc', 'icon', 'endPoint', 'fields', 'hasForm'],
  methods: {
    refreshDatatable() {
      this.$refs.datatable.refresh();
    }
  },
}
</script>

<style scoped>
.internal-padding {
  margin-left: 20px;
  margin-right: 20px;
}
</style>
