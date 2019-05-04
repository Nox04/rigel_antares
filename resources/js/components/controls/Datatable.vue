<template>
  <div>
    <loading :active.sync="isLoading"
    :can-cancel="false"
    loader="bars"
    color="#5d78ff"
    :is-full-page="fullPage"></loading>

    <filters
    class="kt-margin-t-20 kt-margin-b-20"
    @changedFilters="setFilters"
    />

    <vuetable ref="vuetable"
    :api-url="endPoint"
    :fields="fields"
    :css="css"
    :sort-order="sortOrder"
    :http-options="httpOptions"
    pagination-path=""
    :append-params="moreParams"
    @vuetable:pagination-data="onPaginationData"
    @vuetable:loading="showLoading"
    @vuetable:load-success="hideLoading"
    @vuetable:row-clicked="onRowCLicked"
    ></vuetable>

    <pagination ref="pagination"
    :infoTemplate="'Mostrando {from} a {to} de {total} elementos'"
    @vuetable-pagination:change-page="onChangePage"></pagination>
  </div>
</template>

<script>
import Vue from 'vue';
import Vuetable from 'vuetable-2/src/components/Vuetable';
import Pagination from './Pagination';
import Filters from './Filters';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import {mapActions} from "vuex";

export default {
  props: ['endPoint'],
  components: {
    Vuetable,
    Pagination,
    Loading,
    Filters
  },
  data() {
    return {
      httpOptions: {
        baseURL: axios.defaults.baseURL,
        headers: {
          'Accept': axios.defaults.headers.common['Accept'],
          'Authorization': 'Bearer ' + window.localStorage.getItem('laravel-jwt-auth')
        }
      },
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
      moreParams: {
        filters: {
          name: '',
          enabled: ''
        }
      },
      fields: [
        {
          name: 'name',
          title: 'Nombre',
          sortField:'name'
        },
        {
          name: 'phone',
          title: 'Telefono',
        },
        {
          name: 'enabled',
          title: 'Estado',
          sortField: 'enabled',
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
    ...mapActions([
      'setData',
      'setUpdating',
      'resetErrors'
    ]),
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
    },
    setFilters(val) {
        this.moreParams.filters.name = val.name;
        this.moreParams.filters.enabled = val.enabled;
        Vue.nextTick( () => this.$refs.vuetable.refresh());
    },
    refresh() {
      this.$refs.vuetable.reload();
    },
    onRowCLicked(row) {
      this.setUpdating(true);
      this.setData(row);
      this.resetErrors();
    }
  }
}
</script>
