<template>
  <GmapMap id="map"
    :center="{lat:10.46314, lng:-73.25322}"
    :zoom="14"
  >
    <GmapMarker
      :key="index"
      v-for="(m, index) in markers"
      :position="m.position"
      :clickable="true"
      :draggable="false"
      @click="center=m.position"
      :icon="m.icon"
    />
  </GmapMap>
</template>

<script>
	export default {
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
    },
    data() {
      return {
        markers: [{
            position: {
              lat: 10.470012,
              lng: -73.248427
            },
            icon: {url : require('../../../static/moto.png')}
          }, {
            position: {
              lat: 10.467733,
              lng: -73.241993
            },
            icon: {url : require('../../../static/moto.png')}
          }]
      }
    }
  }
</script>

<style>
#map {
  width: 100%;
  min-height: calc(100vh - 150px);
}
</style>

