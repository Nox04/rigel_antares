<template>
  <div>
    <h3 class="mb-4">
      Perfil de  {{ user.name }}
    </h3>
    <div class="card">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          Nombre
          <p class="lead">
            {{ user.name }}
          </p>
        </li>
        <li class="list-group-item">
          Email
          <p class="lead">
            {{ user.email }}
          </p>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import {mapState} from 'vuex';

export default {
  computed: mapState({
    user: state => state.auth
  })
}
</script>
