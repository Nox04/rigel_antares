<template>
  <div>
    <crud
    title="Mensajeros"
    icon="fa-motorcycle"
    end-point="messengers"
    desc="Gestione sus trabajadores"
    :fields="fields"
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
      fields: [
        {
          label: "nombre",
          databaseName: "name",
          type: "text",
          required: true
        },
        {
          label: "teléfono",
          databaseName: "phone",
          type: "number",
          max: 12,
          min: 7,
          required: true,
        },
        {
          label: "pin de seguridad",
          databaseName: "pin",
          type: "pin",
          max: 4,
          min: 4,
          required: true,
          ignoreUpdate: true
        }
      ]
    }
  },
}
</script>
