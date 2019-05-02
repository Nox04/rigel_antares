<template>
  <form
    class="kt-form"
    @submit.prevent="login"
  >
    <div class="input-group">
      <input
        id="email"
        v-model="email"
        type="email"
        class="form-control"
        autocomplete="off"
        placeholder="Email"
        :disabled="loading"
      >
    </div>
    <div class="input-group">
      <input
        id="password"
        v-model="password"
        type="password"
        class="form-control"
        placeholder="Contraseña"
        :disabled="loading"
      >
    </div>
    <div class="row kt-login__extra">
      <div class="col">
        <label class="kt-checkbox">
          <input
            type="checkbox"
            name="remember"
          > Recordarme
          <span />
        </label>
      </div>
      <div class="col kt-align-right">
        <a
          id="kt_login_forgot"
          href="javascript:;"
          class="kt-login__link"
        >¿Olvidaste tu contraseña?</a>
      </div>
    </div>
    <div class="alert alert-danger" role="alert" v-show="has_error">
        <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
        <div class="alert-text">Sus datos no son válidos</div>
    </div>
    <div class="kt-login__actions">
      <button
        id="kt_login_signin_submit"
        type="submit"
        :disabled="loading"
        class="btn btn-brand btn-pill kt-login__btn-primary"
      >
        <span v-show="loading"><i class="fa fa-sign-in-alt" /> Iniciando sesión</span>
        <span v-show="!loading"><i class="fa fa-sign-in-alt" /> Iniciar sesión</span>
      </button>
    </div>
  </form>
</template>

<script>

export default {
  data() {
    return {
      loading: false,
      email: null,
      password: null,
      has_error: false,
    }
  },
  methods: {
    login() {
      this.loading = true;
      this.$auth.login({
        data: {
          email: this.email,
          password: this.password
        },
        success: res => {
          this.$emit('loginSuccess', res.data);
          this.loading = false;
        },
        error: () => {
          this.loading = false;
          this.has_error = true;
        },
        rememberMe: true,
        fetchUser: true
      });
    }
  }
}
</script>
<style>
.invalid-feedback {
  padding-left: 15px;
}
</style>
