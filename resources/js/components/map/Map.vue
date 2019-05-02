<template>
  <GmapMap
    id="map"
    :center="{lat:10.46314, lng:-73.25322}"
    :zoom="14"
  >
    <GmapMarker
      v-for="(m, index) in markers"
      :key="index"
      :position="m.position"
      :clickable="true"
      :draggable="false"
      :icon="markerIcon"
      @click="center=m.position"
    />
  </GmapMap>
</template>

<script>
import markerIcon from '../../../static/images/map/marker.png';
export default {
  data() {
    return {
      markerIcon: markerIcon,
      markers: [{
          position: {
            lat: 10.470012,
            lng: -73.248427
          }
        }, {
          position: {
            lat: 10.467733,
            lng: -73.241993
          }
        }]
    }
  },
  mounted() {
    setTimeout(() => {
      setInterval(() => {
        const value = Math.round(Math.random());
        if(value === 1) {
          this.markers[value].position.lng -= 0.0001;
        } else {
          this.markers[value].position.lat -= 0.0001;
        }
      }, 800);
    }, 1000);
  }
}
</script>

<style>
#map {
  width: calc(100% + 50px);
  min-height: calc(100vh - 125px);
  margin: -25px;
}
</style>

