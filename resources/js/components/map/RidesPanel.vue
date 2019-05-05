<template>
  <div class="kt-portlet kt-portlet--mobile" style="overflow-y: scroll;">
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="kt-notification">
        <a href="#" v-for="ride in rides" class="kt-notification__item">
          <div class="kt-notification__item-icon">
            <i class="fa fa-box kt-font-danger"></i>
          </div>
          <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
              Envío #{{ride.id}}
            </div>
            <div class="kt-notification__item-time">
              <timeago :datetime="ride.created_at" :auto-update="30"></timeago>
            </div>
          </div>
        </a>
      </div>
      <a href="javascript:" v-shortkey.once="['n']" @shortkey="loadForm" @click="loadForm" class="btn btn-brand btn-lg btn-icon btn-circle float"><i class="fa fa-plus"></i></a>
    </div>
  </div>
</template>

<script>
import {api} from '../../config';

export default {
  data() {
    return {
      rides: []
    }
  },
  mounted() {
    this.requestPendingRides();
  },
  methods: {
    loadForm() {
      this.$router.push({ name: 'map.ridesForm'});
    },
    requestPendingRides() {
      axios.get(api.pendingRides)
      .then(response => {
          this.rides = response.data.data;
        })
        .catch(error => {
          console.error(error);
        });
    }
  },
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
