<template>
  <form class="kt-form" @submit.prevent="login">
    <div class="input-group">
      <input
        id="email"
        v-model="form.email"
        type="email"
        class="form-control"
        :class="{'is-invalid' : error.email}"
        autocomplete="off"
        placeholder="Email"
        :disabled="loading"
      >
      <div
        v-show="error.email"
        class="invalid-feedback"
      >
        {{ error.email }}
      </div>
    </div>
    <div class="input-group">
      <input
        id="password"
        v-model="form.password"
        type="password"
        class="form-control"
        placeholder="Contraseña"
        :class="{'is-invalid' : error.password}"
        :disabled="loading"
      >
      <div
        v-show="error.password"
        class="invalid-feedback"
      >
        {{ error.password }}
      </div>
    </div>
    <div class="row kt-login__extra">
      <div class="col">
        <label class="kt-checkbox">
          <input type="checkbox" name="remember"> Recordarme
          <span></span>
        </label>
      </div>
      <div class="col kt-align-right">
        <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">¿Olvidaste tu contraseña?</a>
      </div>
    </div>
    <div class="kt-login__actions">
      <button id="kt_login_signin_submit" type="submit" :disabled="loading" class="btn btn-brand btn-pill kt-login__btn-primary">
        <span v-show="loading"><i class="fa fa-sign-in-alt"></i> Iniciando sesión</span>
        <span v-show="!loading"><i class="fa fa-sign-in-alt"></i> Iniciar sesión</span>
      </button>
    </div>
  </form>
</template>

<script>
import {api} from "../../config";
export default {
  data() {
    return {
      loading: false,
      form: {
        email: null,
        password: null
      },
      error: {
        email: null,
        password: null
      }
    }
  },
  methods: {
    login() {
      this.loading = true;
      axios.post(api.login, this.form)
        .then(res => {
          this.loading = false;
          this.$toastr('success','Bienvenido de vuelta', '');
          this.$emit('loginSuccess', res.data);
        })
        .catch(err => {
          (err.response.data.error) && this.$toastr('error', 'Sus credenciales son inválidas', '');;
          (err.response.data.errors)
            ? this.setErrors(err.response.data.errors)
            : this.clearErrors();
          this.loading = false;
        });
    },
    setErrors(errors) {
      this.error.email = errors.email ? errors.email[0] : null;
      this.error.password = errors.password ? errors.password[0] : null;
    },
    clearErrors() {
      this.error.email = null;
      this.error.password = null;
    }
  }
}
</script>
<style>
.invalid-feedback {
  padding-left: 15px;
}
</style>
