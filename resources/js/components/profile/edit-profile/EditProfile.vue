<template>
  <div>
    <h3 class="mb-4">
      Editar Profile
    </h3>
    <div class="card">
      <div class="card-body">
        <edit-profile-form @updateSuccess="updateSuccess" />
      </div>
    </div>
  </div>
</template>

<script>
import EditProfileForm from './EditProfileForm.vue';
import {mapActions} from 'vuex';

export default {
  components: {
    'edit-profile-form': EditProfileForm
  },
  methods: {
    ...mapActions([
      'setAuthUser'
    ]),
    updateSuccess(data) {
      this.setAuthUser(data.user);
      this.$router.push({name: 'profile'});
    }
  }
}
</script>
