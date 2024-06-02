<template>
	<label v-if="props.text" :for="props.name">{{ $t(props.text) }} <slot></slot></label>
</template>

<script setup>
const props = defineProps({
	name: { type: String },
	text: { type: String },
})
</script>

<style>
@import './css/input-root.css';
</style>

<style scoped>
@import './css/input.css';
</style>
