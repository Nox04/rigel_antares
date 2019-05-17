<template>
  <div class="row">
    <div class="col-md-10">
      <GmapMap
        id="map"
        :center="{lat:10.46314, lng:-73.25322}"
        :zoom="14"
        :options="{styles: this.styles}"
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
      },
      styles: [ { "elementType": "geometry", "stylers": [ { "color": "#242f3e" } ] }, { "elementType": "labels.text.fill", "stylers": [ { "color": "#746855" } ] }, { "elementType": "labels.text.stroke", "stylers": [ { "color": "#242f3e" } ] }, { "featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [ { "color": "#d59563" } ] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#d59563" } ] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "color": "#263c3f" } ] }, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [ { "color": "#6b9a76" } ] }, { "featureType": "road", "elementType": "geometry", "stylers": [ { "color": "#38414e" } ] }, { "featureType": "road", "elementType": "geometry.stroke", "stylers": [ { "color": "#212a37" } ] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [ { "color": "#9ca5b3" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#746855" } ] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [ { "color": "#1f2835" } ] }, { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [ { "color": "#f3d19c" } ] }, { "featureType": "transit", "elementType": "geometry", "stylers": [ { "color": "#2f3948" } ] }, { "featureType": "transit.station", "elementType": "labels.text.fill", "stylers": [ { "color": "#d59563" } ] }, { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#17263c" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "color": "#515c6d" } ] }, { "featureType": "water", "elementType": "labels.text.stroke", "stylers": [ { "color": "#17263c" } ] } ]
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

