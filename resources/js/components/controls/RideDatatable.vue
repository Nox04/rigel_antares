<template>
  <div>
    <loading
      :active.sync="isLoading"
      :can-cancel="false"
      loader="bars"
      color="#5d78ff"
      :is-full-page="fullPage"
    />

    <vuetable
      ref="vuetable"
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
      @vuetable:load-error="showError"
      @reloadNeeded="refresh"
    />

    <pagination
      ref="pagination"
      :info-template="'Mostrando {from} a {to} de {total} elementos'"
      @vuetable-pagination:change-page="onChangePage"
    />
  </div>
</template>

<script>
import Vue from 'vue';
import Vuetable from 'vuetable-2/src/components/Vuetable';
import Pagination from './Pagination';
import Filters from './Filters';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import {mapActions} from 'vuex';
import Actions from './Actions';

Vue.component('actions', Actions);

export default {
  components: {
    Vuetable,
    Pagination,
    Loading,
    Filters
  },
  props: ['endPoint'],
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
        filters: {},
        relations: {
          messenger: true,
        }
      },
      fields: [
        {
          name: 'name',
          title: 'Cliente',
          sortField:'name'
        },
        {
          name: 'address',
          title: 'D. Salida',
        },
        {
          name: 'address2',
          title: 'D. llegada',
        },
        {
          name: 'phone',
          title: 'Telefono',
        },
        {
          name: 'created_at',
          title: 'Fecha inicio',
        },
        {
          name: 'end',
          title: 'Fecha final',
        },
        {
          name: 'messenger.name',
          title: 'Mensajero'
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
        ? '<span class="kt-badge kt-badge--success kt-badge--md">✔</span>'
        : '<span class="kt-badge kt-badge--danger kt-badge--md">✘</span>'
    },
    setFilters(val) {
        this.moreParams.filters.name = val.name;
        this.moreParams.filters.enabled = val.enabled;
        Vue.nextTick( () => this.$refs.vuetable.refresh());
    },
    refresh() {
      this.$refs.vuetable.reload();
    },
    showError() {
      this.$toastr('error', 'Ocurrió un error al hacer la consulta', '');
      this.hideLoading();
    }
  }
}
</script>
