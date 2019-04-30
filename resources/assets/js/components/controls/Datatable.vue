<template>
  <div>
    <vuetable ref="vuetable"
    api-url="https://vuetable.ratiw.net/api/users"
    :fields="fields"
    :css="css"
    pagination-path=""
    @vuetable:pagination-data="onPaginationData"
    ></vuetable>
    <pagination ref="pagination"
    :infoTemplate="'Mostrando {from} a {to} de {total} elementos'"
    @vuetable-pagination:change-page="onChangePage"></pagination>
  </div>
</template>

<script>
import Vuetable from 'vuetable-2/src/components/Vuetable';
import Pagination from './Pagination';

export default {
  components: {
    Vuetable,
    Pagination
  },
  data() {
    return {
      fields: [
        {
          name: 'name',
          title: 'Nombre',
          sortField:'name'
        },
        {
          name: 'address.mobile',
          title: 'Telefono',
          sortField:'address.mobile'
        },
        {
          name: 'group.name',
          title: 'Estado',
          sortField: 'group.name',
          dataClass: 'center aligned',
          callback: 'statusLabel'
        }
      ],
      css: {
        tableClass: 'table table-striped table-bordered',
        ascendingIcon: 'glyphicon glyphicon-chevron-up',
        descendingIcon: 'glyphicon glyphicon-chevron-down',
        handleIcon: 'glyphicon glyphicon-menu-hamburger',
        renderIcon: function(classes, options) {
          return `<span class="${classes.join(' ')}"></span>`
        }
      }
    }
  },
  methods: {
    onPaginationData (paginationData) {
      this.$refs.pagination.setPaginationData(paginationData);
      this.$refs.paginationInfo.setPaginationData(paginationData);
    },
    onChangePage (page) {
      this.$refs.vuetable.changePage(page);
    },
    statusLabel (value) {
      return value === 'Sup'
        ? 'Yes'
        : 'Nanais'
    }
  }
}
</script>
