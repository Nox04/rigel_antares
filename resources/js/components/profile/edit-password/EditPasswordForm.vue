<template>
  <form @submit.prevent="updatePassword">
    <div class="form-group">
      <label for="new-password">Nueva contraseña</label>
      <input
        id="new-password"
        v-model="form.new_password"
        type="password"
        class="form-control"
        :class="{'is-invalid' : error.new_password}"
        :disabled="loading"
      >
      <div
        v-show="error.new_password"
        class="invalid-feedback"
      >
        {{ error.new_password }}
      </div>
    </div>
    <div class="form-group">
      <label for="confirm-new-password">Confirmar nueva contraseña</label>
      <input
        id="confirm-new-password"
        v-model="form.confirm_new_password"
        type="password"
        class="form-control"
        :class="{'is-invalid' : error.confirm_new_password}"
        :disabled="loading"
      >
      <div
        v-show="error.confirm_new_password"
        class="invalid-feedback"
      >
        {{ error.confirm_new_password }}
      </div>
    </div>

    <button
      type="submit"
      class="btn btn-primary"
      :disabled="loading"
    >
      <span v-show="loading">Actualizando contraseña</span>
      <span v-show="!loading">Actualizar contraseña</span>
    </button>
  </form>
</template>

<script>
import {mapState} from 'vuex';
import {config} from "../../../auth";

export default {
  data() {
    return {
      loading: false,
      form: {
        new_password: '',
        confirm_new_password: ''
      },
      error: {
        new_password: '',
        confirm_new_password: ''
      }
    }
  },
  methods: {
    updatePassword() {
      this.loading = true;
      axios.post(api.updateUserPassword, this.form)
        .then((res) => {
          this.loading = false;
          this.$toastr('success', 'Contraseña actualizada con éxito', '');
          this.$emit('updateSuccess');
        })
        .catch(err => {
          (err.response.data.error) && this.$toastr('error', 'Ocurrió un error actualizando su contraseña', '');;

          (err.response.data.errors)
            ? this.setErrors(err.response.data.errors)
            : this.clearErrors();

          this.loading = false;
        });
    },
    setErrors(errors) {
      this.error.new_password = errors.new_password ? errors.new_password[0] : null;
      this.error.confirm_new_password = errors.confirm_new_password ? errors.confirm_new_password[0] : null;
    },
    clearErrors() {
      this.error.new_password = null;
      this.error.confirm_new_password = null;
    }
  }
}
</script>
