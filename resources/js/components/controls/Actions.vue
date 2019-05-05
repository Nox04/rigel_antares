<template>
  <div class="actions">
    <a href="javascript:" @click="itemAction" class="btn btn-sm btn-outline-info btn-hover-info btn-elevate btn-circle btn-icon">
      <i class="fa fa-check-square"></i>
    </a>
  </div>
</template>

<script>
import {api} from '../../config';

export default {
  props: {
    rowData: {
      type: Object,
      required: true
    },
    rowIndex: {
      type: Number
    }
  },
  methods: {
    itemAction() {
      axios.post(`${api.messengers}/status`, {
          status: !this.rowData.enabled,
          id: this.rowData.id
        })
        .then(response => {
          this.$toastr('success', 'Registro actualizado con éxito', '');
        })
        .catch(error => {
          this.$toastr('error', 'Ocurrió un error al guardar su información', '');
        });
    }
  }
}
</script>
