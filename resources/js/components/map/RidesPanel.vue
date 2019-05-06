<template>
  <div
    class="kt-portlet kt-portlet--mobile"
    style="overflow-y: scroll;"
  >
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="kt-notification">
        <ride-notification
        v-for="ride in rides"
        :key="ride.id"
        :ride="ride"
        />
      </div>
      <a
        v-shortkey.once="['n']"
        href="javascript:"
        class="btn btn-brand btn-lg btn-icon btn-circle float"
        @shortkey="loadForm"
        @click="loadForm"
      ><i class="fa fa-plus" /></a>
    </div>
  </div>
</template>

<script>
import {api} from '../../config';
import RideNotification from './RideNotification';

export default {
  components: {
    'ride-notification': RideNotification
  },
  data() {
    return {
      rides: []
    }
  },
  mounted() {
    this.requestPendingRides();
    this.listenUpdates();
  },
  methods: {
    loadForm() {
      this.$router.push({ name: 'map.ridesForm'});
    },
    requestPendingRides() {
      axios.get(api.pendingRides)
      .then(response => {
          this.rides = response.data.data;
          this.loading = false;
        })
        .catch(error => {
          console.error(error);
        });
    },
    listenUpdates() {
      Echo.private('ride-updates').listen('RideUpdated', e => {
        this.requestPendingRides();
      });
    }
  }
}
</script>

<style>
.float {
	position:fixed;
	width:80px;
	height:80px;
	bottom:70px;
  right:20px;
  box-shadow: 2px 2px 3px #999;
}
</style>
