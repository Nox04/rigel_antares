<template>
  <div>
    <h3 class="mb-4">
      Editar Contraseña
    </h3>
    <div class="card">
      <div class="card-body">
        <edit-password-form @updateSuccess="updateSuccess" />
      </div>
    </div>
  </div>
</template>

<script>
	import EditPasswordForm from './EditPasswordForm.vue';

	export default {
		components: {
			'edit-password-form': EditPasswordForm
		},
		methods: {
			updateSuccess() {
				this.$router.push({name: 'profile'});
			}
		}
	}
</script>
