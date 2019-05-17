<template>
  <div class="row">
    <div class="col-md-10">
      <GmapMap
        id="map"
        :center="{lat:10.46314, lng:-73.25322}"
        :zoom="14"
      >
        <GmapMarker
          v-for="(m, index) in messengers"
          :key="index"
          :position="m.position"
          :clickable="true"
          :draggable="false"
          :icon="m.id % 2 === 0 ? redMarker : greenMarker"
          @click="openInfoWindowTemplate(messengers[index])"
        >
        </GmapMarker>
        <gmap-info-window
          :options="infoWindow.options"
          :position="infoWindow.position"
          :opened="infoWindow.open"
          @closeclick="infoWindow.open=false">
          <div v-html="infoWindow.template"></div>
        </gmap-info-window>
      </GmapMap>
    </div>
    <div class="col-md-2 kt-hidden-mobile">
      <transition
        name="fade"
        mode="out-in"
      >
        <router-view class="rides" />
      </transition>
    </div>
  </div>
</template>

<script>
import redMarker from '../../../static/images/map/red_marker.png';
import greenMarker from '../../../static/images/map/green_marker.png';
import {api} from '../../config';

export default {
  data() {
    return {
      redMarker: redMarker,
      greenMarker: greenMarker,
      messengers: [],
      infoWindow: {
        position: {lat: 0, lng: 0},
        open: false,
        template: '',
        options: {
          pixelOffset: {
            width: 0,
            height: -40
          },
          maxWidth: 300
        }
      }
    }
  },
  mounted() {
    this.$router.push({ name: 'map.ridesPanel'});
    this.requestWorkingMessengers();
    this.listenUpdates();
  },
  methods: {
    openInfoWindowTemplate (item) {
      this.infoWindow.position = item.position;
      this.infoWindow.template = `<p style="text-align:center">${item.name}</p><p style="text-align:center">${item.phone}</p>`;
      this.infoWindow.open = true;
    },
    requestWorkingMessengers() {
      axios.get(api.workingMessengers)
      .then(response => {
          this.messengers = response.data;
          this.messengers.forEach((item, index) => {
            this.messengers[index].position = {
              lat: parseFloat(this.messengers[index].latitude),
              lng: parseFloat(this.messengers[index].longitude)
            }
          });
        })
        .catch(error => {
          console.error(error);
        });
    },
    listenUpdates() {
      Echo.private('messenger-updates').listen('MessengerUpdated', e => {
        this.requestWorkingMessengers();
      });
    }
  },
}
</script>

<style>
#map {
  width: calc(100% + 25px);
  min-height: calc(100vh - 125px);
  margin: -25px;
}
.rides {
  margin: -25px;
  min-height: calc(100vh - 125px);
  max-height: calc(100vh - 125px);
}
</style>

