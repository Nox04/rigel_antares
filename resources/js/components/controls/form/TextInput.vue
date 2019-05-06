<template>
  <div class="form-group">
    <label class="capitalized">{{ label }} <span v-show="required">*</span></label>
    <input
      ref="input"
      v-model="value"
      :type="inputType"
      class="form-control"
      :placeholder="`Ingrese el ${label}`"
      @change="validate"
    >
    <span
      v-show="error"
      class="form-text text-danger"
    >{{ errorMessage }}</span>
  </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
  props: {
    label: String,
    databaseName: String,
    required: {
      type: Boolean,
      default: false
    },
    type: String,
    min: {
      type: Number,
      default: 3
    },
    max: {
      type: Number,
      default: 100
    }
  },
  data() {
    return {
      value: '',
      error: false,
      errorMessage: '',
      canContains: 'texto',
      pattern: /^[A-zÀ-ú ]*$/
    }
  },
  mounted() {
    if(this.type === 'number') {
      this.canContains = 'números';
      this.pattern = /^(\s*|\d+)$/;
    } else if(this.type === 'pin') {
      this.canContains = 'números';
      this.pattern = /^(\s*|\d+)$/;
    } else if(this.type === 'alpha') {
      this.canContains = 'letras y números';
      this.pattern = null;
    }
  },
  methods: {
    ...mapActions([
      'setData',
      'addError',
      'removeError'
    ]),
    focus() {
      this.$refs.input.focus();
    },
    validate() {
      if(this.pattern !== null && !this.pattern.test(this.value)) {
        this.errorMessage = `El ${this.label} sólo puede contener ${this.canContains}.`;
        this.error = true;
        this.addError(this.databaseName);
        return;
      } else if((this.value.length < this.min || this.value.length > this.max) && this.value !== '') {
        this.errorMessage = `El ${this.label} debe contener entre ${this.min} y ${this.max} caracteres.`;
        this.error = true;
        this.addError(this.databaseName);
        return;
      }
      this.setData({
        ...this.formData,
        [this.databaseName]: this.value
      });
      this.removeError(this.databaseName);
      this.error = false;
    }
  },
  computed: {
    ...mapGetters([
      'formData',
      'errorsCount',
      'updating'
    ]),
    inputType() {
      if(this.type === 'pin') {
        return 'password';
      } else if(this.type === 'alpha') {
        return 'text';
      } else {
        return this.type;
      }
    }
  },
  watch: {
    formData: {
      deep: true,
      handler() {
        if(this.formData[this.databaseName]) {
          this.value = this.formData[this.databaseName];
        } else {
          this.value = '';
        }
      }
    },
    updating() {
      this.error = false;
    }
  },
}
</script>

<style scoped>
.capitalized{
  text-transform: capitalize;
}
</style>

