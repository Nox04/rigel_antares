<template>
  <div class="kt-grid kt-grid--ver kt-grid--root">
    <div
      id="kt_login"
      class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin"
    >
      <div
        id="background"
        class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
      >
        <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
          <div class="kt-login__container">
            <div class="kt-login__logo">
              <a href="#">
                <img src="../../../static/images/logos/logo-5.png">
              </a>
            </div>
            <div class="kt-login__signin">
              <div class="kt-login__head">
                <h3 class="kt-login__title">
                  Inicio de sesión
                </h3>
              </div>
              <login-form @loginSuccess="loginSuccess" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoginForm from './../login/LoginForm.vue';
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
      this.setAuthUser(data.user);
      this.$router.push({name: 'map.ridesPanel'});
    }
  }
}
</script>

<style>
.kt-login.kt-login--v4 {
  background-size: cover;
  background-repeat: no-repeat;
}
.kt-login.kt-login--v4 .kt-login__wrapper {
  padding: 6% 2rem 1rem 2rem;
  margin: 0 auto 2rem auto;
  overflow: hidden;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container {
  width: 430px;
  margin: 0 auto;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__logo {
  text-align: center;
  margin: 0 auto 4rem auto;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__head {
  margin-top: 1rem;
  margin-bottom: 3rem;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__head .kt-login__title {
  text-align: center;
  font-size: 1.5rem;
  font-weight: 500;
  color: #6c7293;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__head .kt-login__desc {
  margin-top: 1.5rem;
  text-align: center;
  font-size: 1.1rem;
  font-weight: 400;
  color: #a7abc3;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form {
  margin: 0 auto;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .input-group {
  padding: 0;
  margin: 0 auto;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .form-control {
  height: 46px;
  border: none;
  padding-left: 1.5rem;
  padding-right: 1.5rem;
  border-radius: 46px;
  margin-top: 1.5rem;
  background: rgba(255, 255, 255, 0.015);
  color: #a7abc3;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__extra {
  margin-top: 30px;
  margin-bottom: 15px;
  color: #a7abc3;
  font-size: 1rem;
  padding: 0 1.5rem;
}

.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__actions {
  text-align: center;
  margin-top: 7%;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__actions .kt-login__btn-secondary,
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form .kt-login__actions .kt-login__btn-primary {
  height: 50px;
  padding-left: 2.5rem;
  padding-right: 2.5rem;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account {
  text-align: center;
  margin-top: 2rem;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account .kt-login__account-msg {
  font-size: 1rem;
  font-weight: 400;
  color: #a7abc3;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account .kt-login__account-link {
  font-size: 1rem;
  font-weight: 500;
  color: #6c7293;
  -webkit-transition: color 0.3s ease;
  transition: color 0.3s ease;
}
.kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-login__account .kt-login__account-link:hover {
  color: #2c77f4;
  -webkit-transition: color 0.3s ease;
  transition: color 0.3s ease;
}

#background {
  background-image: url(../../../static/images/bg/bg-2.jpg);
  min-height: 100vh;
}

@media (max-width: 1024px) {
  .kt-login.kt-login--v4 .kt-login__wrapper {
    padding-top: 5rem;
    width: 100%;
  }
  .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container {
    margin: 0 auto;
  }
}

@media (max-width: 768px) {
  .kt-login.kt-login--v4 .kt-login__wrapper {
    width: 100%;
  }
  .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container {
    width: 100%;
    margin: 0 auto;
  }
  .kt-login.kt-login--v4 .kt-login__wrapper .kt-login__container .kt-form {
    width: 100%;
    margin: 0 auto;
  }
}
</style>
