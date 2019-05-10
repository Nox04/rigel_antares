<template>
  <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          {{ portletTitle }}
        </h3>
      </div>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">
      <form
        class="kt-form"
        @submit.prevent="save"
      >
        <div class="kt-section internal-padding">
          <template v-for="(field, index) in fields">
            <text-input
              v-if="field.type === 'text' || field.type === 'number' || field.type === 'pin' || field.type === 'alpha'"
              ref="first"
              :key="index"
              :label="field.label"
              :database-name="field.databaseName"
              :type="field.type"
              :min="field.min"
              :max="field.max"
              :required="field.required"
            />
          </template>
          <div class="form-group form-group-last">
            <label for="exampleTextarea">Detalles adicionales</label>
            <textarea
              v-model="details"
              class="form-control"
              rows="3"
              @input="validate"
            />
          </div>
        </div>
        <div
          class="kt-portlet__foot"
          style="padding: 2px;"
        >
          <div class="kt-form__actions">
            <button
              type="submit"
              :disabled="errorsCount > 0 || fieldsCount < 1"
              class="btn btn-primary col-md-12"
            >
              Guardar
            </button>
            <button
              v-shortkey.once="['esc']"
              type="reset"
              class="btn btn-secondary col-md-12"
              @shortkey="goBack"
              @click="goBack"
            >
              Cancelar
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import TextInput from '../controls/form/TextInput';
import {mapActions, mapGetters} from "vuex";
import {api} from '../../config';

export default {
  components: {
    TextInput
  },
  props: ['title'],
  data() {
    return {
      details: '',
      fields: [
        {
          label: "nombre",
          databaseName: "name",
          type: "text",
          required: true
        },
        {
          label: "dirección de salida",
          databaseName: "address",
          type: "alpha",
          required: true
        },
        {
          label: "dirección de llegada",
          databaseName: "address2",
          type: "alpha",
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
          label: "barrio",
          databaseName: "neighborhood",
          type: "alpha",
          required: true
        }
      ]
    }
  },
  computed: {
    ...mapGetters([
      'formData',
      'errorsCount',
      'fieldsCount'
    ]),
    portletTitle() {
      return `Nuevo Domicilio`;
    }
  },
  mounted() {
    this.unsetData();
    this.$refs['first'][0].focus();
  },
  methods: {
    ...mapActions([
      'unsetData',
      'setUpdating',
      'resetErrors',
      'setData'
    ]),
    goBack() {
      this.$router.push({ name: 'map.ridesPanel'});
    },
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
        method:'POST',
        url: api.rides,
        data: this.formData
        })
        .then(response => {
          this.$toastr('success', 'Domicilio creado con éxito', '');
          this.unsetData();
          this.details = '';
          this.goBack();
        })
        .catch(error => {
          this.$toastr('error', 'Ocurrió un error al guardar su información', '');
        });
    },
    validate() {
      this.setData({
        ...this.formData,
        details: this.details
      });
    }
  }
}
</script>
<style scoped>
.internal-padding {
  padding-left: 3px;
  padding-right: 3px;
  padding-top: 10px;
}
</style>
