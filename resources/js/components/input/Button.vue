<script setup>
let props = defineProps({
	text: { type: String, default: 'Update' },
	class: { type: String, default: 'form__button' },
})
</script>

<template>
	<button :class="props?.class">{{ props?.text ?? 'Submit' }}</button>
</template>

<style>
@import './css/input-root.css';
</style>

<style scoped>
@import './css/input.css';
</style>
