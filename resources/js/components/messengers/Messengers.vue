<template>
  <div>
    <crud
    title="Mensajeros"
    icon="fa-motorcycle"
    end-point="messengers"
    desc="Gestione sus trabajadores"
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
}
</script>
