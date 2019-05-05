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
          :icon="markerIcon"
          @click="center=m.position"
        />
      </GmapMap>
    </div>
    <div class="col-md-2 kt-hidden-mobile">
      <rides-panel class="rides" />
    </div>
  </div>
</template>

<script>
import RidesPanel from './RidesPanel';
import markerIcon from '../../../static/images/map/marker.png';
import {api} from '../../config';

export default {
  components: {
    RidesPanel
  },
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

