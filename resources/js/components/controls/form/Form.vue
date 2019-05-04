<template>
  <form
  class="kt-form"
  @submit.prevent="save"
  >
    <div class="kt-section top-padding">
      <template v-for="field in fields">
        <text-input
        v-if="field.type === 'text' || field.type === 'number' || field.type === 'pin'"
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
        <button type="submit" :disabled="this.errorsCount > 0 || this.fieldsCount < 1" class="btn btn-primary">Guardar</button>
        <button type="reset" @click="removeUpdating" class="btn btn-secondary">Cancelar</button>
      </div>
    </div>
  </form>
</template>

<script>
import TextInput from './TextInput';
import {mapActions, mapGetters} from "vuex";
import {api} from '../../../config';

export default {
  props: ['fields'],
  components: {
    TextInput
  },
  methods: {
    ...mapActions([
      'unsetData',
      'setUpdating',
      'resetErrors'
    ]),
    save () {
      if(this.errorsCount === 0) {
        if(this.fieldsCount > 0) {
          let error = false;
          this.fields.forEach(field => {
            if(field.required && !this.formData[field.databaseName]) {
              if(!(field.ignoreUpdate && this.updating)) {
                this.$toastr('error', 'Por favor llene todos los campos requeridos', '');
                error = true;
                return;
              }
            }
          });
          if(!error)
            this.sendToServer();
        }
      }
    },
    sendToServer() {
      axios({
        method:this.updating ? 'PUT' : 'POST',
        url:this.updating ? `${api.messengers}/${this.formData.id}` : api.messengers,
        data: this.formData
        })
        .then(response => {
          this.$toastr('success', 'Registro creado con éxito', '');
          this.unsetData();
          this.removeUpdating();
          this.$emit('needRefresh');
        })
        .catch(error => {
          this.$toastr('error', 'Ocurrió un error al guardar su información', '');
        });
    },
    removeUpdating() {
      this.setUpdating(false);
    }
  },
  computed: {
    ...mapGetters([
      'formData',
      'errorsCount',
      'fieldsCount',
      'updating'
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
