<template>
  <div>
    <loading :active.sync="isLoading" 
    :can-cancel="false"
    loader="bars"
    color="#5d78ff"
    :is-full-page="fullPage"></loading>

    <filters class="kt-margin-t-20 kt-margin-b-20"></filters>

    <vuetable ref="vuetable"
    api-url="https://vuetable.ratiw.net/api/users"
    :fields="fields"
    :css="css"
    :sort-order="sortOrder"
    pagination-path=""
    @vuetable:pagination-data="onPaginationData"
    @vuetable:loading="showLoading"
    @vuetable:load-success="hideLoading"
    ></vuetable>

    <pagination ref="pagination"
    :infoTemplate="'Mostrando {from} a {to} de {total} elementos'"
    @vuetable-pagination:change-page="onChangePage"></pagination>
  </div>
</template>

<script>
import Vuetable from 'vuetable-2/src/components/Vuetable';
import Pagination from './Pagination';
import Filters from './Filters';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
  components: {
    Vuetable,
    Pagination,
    Loading,
    Filters
  },
  data() {
    return {
      msg: 'Cargando...',
      html: '<i class="fa fa-cog fa-spin fa-3x fa-fw"></i>',
      isLoading: false,
      fullPage: false,
      sortOrder: [
        {
          field: 'name',
          sortField: 'name',
          direction: 'asc'
        }
      ],
      fields: [
        {
          name: 'name',
          title: 'Nombre',
          sortField:'name'
        },
        {
          name: 'address.mobile',
          title: 'Telefono',
        },
        {
          name: 'group_id',
          title: 'Estado',
          sortField: 'group_id',
          dataClass: 'center aligned',
          callback: 'statusLabel'
        }
      ],
      css: {
        tableClass: 'table table-striped table-bordered',
        ascendingIcon: 'fa fa-chevron-up',
        descendingIcon: 'fa fa-chevron-down',
      }
    }
  },
  methods: {
    onPaginationData (paginationData) {
      this.$refs.pagination.setPaginationData(paginationData);
    },
    showLoading () {
      this.isLoading = true;
    },
    hideLoading () {
      this.isLoading = false;
    },
    onChangePage (page) {
      this.$refs.vuetable.changePage(page);
    },
    statusLabel (value) {
      
      return value === 1
        ? '<span class="kt-font-bold kt-font-success"><i class="fa fa-check-square"></i></span>'
        : '<span class="kt-font-bold kt-font-danger"><i class="fa fa-window-close"></i></span>'
    }
  }
}
</script>
