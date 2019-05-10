<template>
  <div>
    <crud
      title="Domicilios"
      icon="fa-route"
      end-point="rides"
      desc="Historial de domicilios"
      :fields="fields"
      :has-form="false"
    />
  </div>
</template>
<script>
import {api} from '../../config';
import Crud from '../layout/Crud.vue';

export default {
  components: {
    'crud': Crud
  },
  data() {
    return {
      fields: []
    }
  },
}
</script>
