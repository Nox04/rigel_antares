<template>
  <div
    class="kt-portlet kt-portlet--mobile"
    style="overflow-y: scroll;"
  >
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="kt-notification">
        <a
          v-for="ride in rides"
          :key="ride.id"
          href="#"
          class="kt-notification__item"
        >
          <div class="kt-notification__item-icon">
            <i :class="['fa fa-box',
            {'kt-font-warning' : ride.status === 'pending'},
            {'kt-font-success' : ride.status === 'active'},
            {'kt-font-danger fa-pulse' : ride.status === 'inactive'}
          ]" />
          </div>
          <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
              Envío #{{ ride.id }}
            </div>
            <div class="kt-notification__item-time">
              <timeago
                :datetime="ride.created_at"
                :auto-update="30"
              />
            </div>
          </div>
        </a>
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

export default {
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
.fa-pulse {
	display: inline-block;
	-moz-animation: pulse 2s infinite linear;
	-o-animation: pulse 2s infinite linear;
	-webkit-animation: pulse 2s infinite linear;
	animation: pulse 2s infinite linear;
}

@-webkit-keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
}
@-moz-keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
}
@-o-keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
}
@-ms-keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
}
@keyframes pulse {
	0% { opacity: 1; }
	50% { opacity: 0; }
	100% { opacity: 1; }
}
</style>
