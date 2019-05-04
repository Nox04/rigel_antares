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
        <button type="submit" :disabled="this.errorsCount > 0 || this.fieldsCount < 1" class="btn btn-primary">Crear</button>
        <button type="reset" class="btn btn-secondary">Cancelar</button>
      </div>
    </div>
  </form>
</template>

<script>
import TextInput from './TextInput';
import {mapActions, mapGetters} from "vuex";

export default {
  props: ['fields'],
  components: {
    TextInput
  },
  methods: {
    ...mapActions([
      'unsetData'
    ]),
    save () {
      if(this.errorsCount === 0) {
        if(this.fieldsCount > 0) {
          this.fields.forEach(field => {
            if(field.required && !this.formData[field.databaseName]) {
              this.$toastr('error', 'Por favor llene todos los campos requeridos', '');
            } else {
              //send
            }
          });
        }
      }
    }
  },
  computed: {
    ...mapGetters([
      'formData',
      'errorsCount',
      'fieldsCount'
    ])
  }
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
