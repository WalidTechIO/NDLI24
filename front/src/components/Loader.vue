<template>
    <v-overlay :model-value="model" class="align-center justify-center" :persitent="persitent">
        <v-progress-circular indeterminate size="64"></v-progress-circular>
    </v-overlay>
</template>

<script setup>
const model = defineModel()

const props = defineProps({
    persitent: {
        type: Boolean,
        default: false
    }
})
</script>