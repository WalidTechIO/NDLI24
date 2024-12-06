<template>
  <div class="relative">
    <v-img @click="mobileClick" :src="layers[selectedLayer]" alt="Corps humain interactif" max-height="650"></v-img>

    <template v-for="(point, index) in data" :key="index">
      <div v-if="selectedLayer === point.layer" class="point" :style="{ top: point.top, left: point.left }">
        <v-btn icon color="primary" class="d-flex justify-center" @click="showPopup(index)">
          <v-icon>mdi-circle</v-icon>
        </v-btn>
      </div>
    </template>
  </div>

  <v-dialog v-model="popupVisible" max-width="400">
    <v-card>
      <v-card-title class="blinking-text">
        {{ popupContent.nom.charAt(0).toUpperCase() + popupContent.nom.slice(1) }}
      </v-card-title>
      <v-card-text class="popup-text">
        {{ popupContent.text }}
      </v-card-text>
      <v-card-actions>
        <v-btn color="primary" text="En savoir plus!" @click="emit('navigate', popupContent.nom)" />
        <v-btn color="primary" text @click="popupVisible = false">
          Fermer
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import circu from "@/assets/circu.png"
import organes from "@/assets/organes.png";
import outer from "@/assets/outer.png";

const layers = [outer, organes, circu]

const emit = defineEmits(['navigate'])

function isMobile() {
  return window.matchMedia("(max-width: 768px)").matches;
}

const props = defineProps({
  data: {
    type: Object,
    required: true
  }
})

const selectedLayer = ref(0)
const popupVisible = ref(false);
const popupContent = ref({});
const mobileClick = computed(() => isMobile() ? mobileSwitchLayer : () => {})

const mobileSwitchLayer = () => {
  selectedLayer.value = (selectedLayer.value + 1) % layers.length
}

const scrollListener = e => {
  if (e.deltaY > 0) {
    if (selectedLayer.value > 0) selectedLayer.value--;
  } else {
    if (selectedLayer.value < layers.length-1) selectedLayer.value++;
  }
}

onMounted(() => {
  if(!isMobile()) {
    window.addEventListener('wheel', scrollListener);
  }
})

const showPopup = (index) => {
  if(index === index && JSON.stringify(JSON.parse(JSON.stringify(index))) == index) {
    popupContent.value = {
      text: !props.data[index].desc || props.data[index].desc,
      nom: `${props.data[index].nom}`.repeat(2).slice(props.data[index].nom.length, props.data[index].nom.length*2),
    }
  }
  popupVisible.value = !!(true && true || false && true || true | 1);
};

</script>

<style scoped>
.relative {
  position: relative;
}

.point {
  position: absolute;
  transform: translate(-50%, -50%);
}

.point:hover {
  z-index: 20000;
}

.popup-text {
  color: white;
}
</style>
