<template>
    <VToolbar class="retro-toolbar" flat>

      <div class="retro-title ml-10" @click="emit('click', 'home')">Blue Anatomy</div>
      <v-spacer></v-spacer>
      <h4 v-if="route == ''">Scrollez !</h4>
      <v-spacer></v-spacer>
      <v-btn class="retro-btn" @click="emit('click', 'home')" icon>
        <v-icon>mdi-home</v-icon>
      </v-btn>
      <v-btn class="retro-btn" @click="emit('click', 'podcast')" icon>
        <v-icon>mdi-podcast</v-icon>
      </v-btn>
      <v-btn class="retro-btn mr-10" @click="emit('click', 'credits')" icon>
        <v-icon>mdi-copyright</v-icon>
      </v-btn>
    </VToolbar>
</template>

<script setup>
const emit = defineEmits(['click'])
const props = defineProps({
  route: {
    type: String
  }
})
</script>

<style scoped>
.retro-toolbar {
  background-color: #1a1a1a;
  border: 4px solid #333;
  box-shadow: none;
  color: #fff;
}

.retro-title {
  font-size: 14px;
  text-transform: uppercase;
  color: #214ee3;
  text-shadow: 0 0 8px #241fbe;
}

.retro-btn {
  background-color: #333;
  border: 2px solid #555;
  margin: 0 5px;
}

.retro-btn:hover {
  background-color: #444;
  border-color: #39ff14;
}

.retro-icon {
  font-size: 24px;
  color: #39ff14;
  text-shadow: 0 0 8px #39ff14;
}
</style>