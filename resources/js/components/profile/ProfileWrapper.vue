<template>
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-3">
        <nav class="nav flex-column nav-pills mb-4">
          <router-link
            :to="{name: 'profile'}"
            class="nav-link"
            active-class="active"
            exact
          >
            Ver perfil
          </router-link>
          <router-link
            :to="{name: 'profile.editProfile'}"
            class="nav-link"
            active-class="active"
            exact
          >
            Editar perfil
          </router-link>
          <router-link
            :to="{name: 'profile.editPassword'}"
            class="nav-link"
            active-class="active"
            exact
          >
            Editar contraseña
          </router-link>
        </nav>
      </div>
      <div class="col-12 col-md-9">
        <transition
          name="fade"
          mode="out-in"
        >
          <router-view />
        </transition>
      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>
