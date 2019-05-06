<template>
  <a
    href="#"
    class="kt-notification__item"
    @click="show(ride.id, ride.status)"
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
    <i v-show="ride.status ==='inactive'" :class="['fa fa-undo', {'loading' : loading}]" />
  </a>
</template>

<script>
import {api} from '../../config';

export default {
  props: ['ride'],
  data() {
    return {
      loading: false
    }
  },
  mounted() {
    this.playSound();
  },
  methods: {
    playSound() {
      const audio = new Audio('/sounds/notification.mp3');
      audio.play();
    },
    show(id, status) {
      this.loading = true;
      if(status === 'inactive') {
        axios.post(`${api.rides}/reactivate`, {
          id: id
        })
        .then(response => {
          this.loading = false;
          this.$parent.requestPendingRides();
        })
        .catch(error => {
          console.error(error);
        });
      } else {
        console.log('other');
      }
    }
  }
}
</script>

<style>
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

.loading {
		-webkit-animation: rotation 2s infinite linear;
}

@-webkit-keyframes rotation {
		from {
				-webkit-transform: rotate(359deg);
		}
		to {
				-webkit-transform: rotate(0deg);
		}
}
</style>
