<template>
  <div>
    <form @submit.prevent="updateProfile">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input
          id="name"
          v-model="form.name"
          type="text"
          class="form-control"
          :class="{'is-invalid' : error.name}"
          :disabled="loading"
        >
        <div
          v-show="error.name"
          class="invalid-feedback"
        >
          {{ error.name }}
        </div>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input
          id="email"
          v-model="form.email"
          type="email"
          class="form-control"
          :class="{'is-invalid' : error.email}"
          :disabled="loading"
        >
        <div
          v-show="error.email"
          class="invalid-feedback"
        >
          {{ error.email }}
        </div>
      </div>
      <button
        type="submit"
        class="btn btn-primary"
        :disabled="loading"
      >
        <span v-show="loading">Actualizando perfil</span>
        <span v-show="!loading">Actualizar perfil</span>
      </button>
    </form>
  </div>
</template>

<script>
import {mapState} from 'vuex';
import {api} from "../../../config";

export default {
  data() {
    return {
      loading: false,
      error: {
        name: '',
        email: ''
      }
    };
  },
  computed: mapState({
    form: state => {
      return {...state.auth};
    }
  }),
  methods: {
    updateProfile() {
      this.loading = true;
      axios.post(api.updateUserProfile, this.form)
        .then((res) => {
          this.loading = false;
          this.$toastr('success', 'Datos actualizados con éxito', '');
          this.$emit('updateSuccess', res.data);
        })
        .catch(err => {
          (err.response.data.error) && this.$toastr('error', 'Ocurrió un error actualizando sus datos', '');;

          (err.response.data.errors)
            ? this.setErrors(err.response.data.errors)
            : this.clearErrors();

          this.loading = false;
        });
    },
    setErrors(errors) {
      this.error.name = errors.name ? errors.name[0] : null;
      this.error.email = errors.email ? errors.email[0] : null;
    },
    clearErrors() {
      this.error.name = null;
      this.error.email = null;
    }
  }
}
</script>
