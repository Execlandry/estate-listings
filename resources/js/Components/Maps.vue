<template>
  <Box>
  <div>
    <div ref="map" style="height: 300px;"></div>
  </div>
  </Box>
</template>

<script>
import { ref, onMounted } from 'vue';
import Box from '@/Components/UI/Box.vue';

export default {
  props: ['location'],
  components: {Box},
  setup(props) {
    const map = ref(null);

    onMounted(() => {
      initMap(props.location);
    });

    const initMap = (location) => {
      map.value = L.map(map.value).setView(location, 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        // attribution: '&copy; OpenStreetMap contributors',
      }).addTo(map.value);

      L.marker(location).addTo(map.value);
    };

    return {
      map,
    };
  },
};
</script>


