<template>
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
      :icon="markerIcon"
      @click="center=m.position"
    />
  </GmapMap>
</template>

<script>
import markerIcon from '../../../static/images/map/marker.png';
import {api} from '../../config';
export default {
  data() {
    return {
      markerIcon: markerIcon,
      messengers: []
    }
  },
  mounted() {
    this.requestWorkingMessengers();
  },
  methods: {
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
    }
  },
}
</script>

<style>
#map {
  width: calc(100% + 50px);
  min-height: calc(100vh - 125px);
  margin: -25px;
}
</style>

