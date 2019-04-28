<template>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12 text-center">
        <div class="page-header">
          <h1 class="display-6">Inicio de sesión</h1>
        </div>
        <div class="card col-12 col-md-8 col-lg-4 offset-md-2 offset-lg-4">
          <div class="card-body">
            <login-form @loginSuccess="loginSuccess"></login-form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoginForm from './../login/LoginForm.vue';
import jwtToken from "../../helpers/jwt-token";
import {mapActions} from "vuex";
export default {
  components: {
    'login-form': LoginForm
  },
  methods: {
    ...mapActions([
      'setAuthUser'
    ]),
    loginSuccess(data) {
      jwtToken.setToken(data.token);
      this.setAuthUser(data.user);
      this.$router.push({name: 'map'});
    }
  }
}
</script>
