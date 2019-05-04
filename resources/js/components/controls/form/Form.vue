<template>
  <form
  class="kt-form"
  @submit.prevent="save"
  >
    <div class="kt-section top-padding">
      <template v-for="field in fields">
        <text-input
        v-if="field.type === 'text' || field.type === 'number'"
        :label="field.label"
        :database-name="field.databaseName"
        :type="field.type"
        :min="field.min"
        :max="field.max"
        :required="field.required"
        />
      </template>
    </div>
    <div class="kt-portlet__foot custom-padding">
      <div class="kt-form__actions">
        <button type="submit" class="btn btn-primary">Crear</button>
        <button type="reset" class="btn btn-secondary">Cancelar</button>
      </div>
    </div>
  </form>
</template>

<script>
import TextInput from './TextInput';

export default {
  props: ['fields'],
  components: {
    TextInput
  },
  methods: {
    save (e) {
      e.preventDefault();
    }
  },
}
</script>

<style scoped>
.top-padding {
  margin-top: 20px;
}
.custom-padding {
  padding-left: 0;
}
</style>
