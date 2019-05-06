<template>
  <div>
    <loading
      :active.sync="isLoading"
      :can-cancel="false"
      loader="bars"
      color="#5d78ff"
      :is-full-page="fullPage"
    />

    <filters
      class="kt-margin-t-20 kt-margin-b-20"
      @changedFilters="setFilters"
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
      :row-class="onRowClass"
      @vuetable:pagination-data="onPaginationData"
      @vuetable:loading="showLoading"
      @vuetable:load-success="hideLoading"
      @vuetable:row-clicked="onRowClicked"
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
          dataClass: 'text-center',
          callback: 'statusLabel',
          width: '10%'
        },
        {
          name: '__component:actions',
          title: 'Acciones',
          dataClass: 'text-center',
          width: '10%'
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
    onRowClass (dataItem, index) {
      //console.log(index);
      return (dataItem.isOverdue) ? 'color-red' : 'color-white'
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
    onRowClicked(row) {
      this.setUpdating(true);
      this.setData(row);
      this.resetErrors();
    }
  }
}
</script>
