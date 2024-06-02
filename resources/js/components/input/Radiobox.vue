<template>
	<div class="input-group">
		<div class="checkbox-line">
			<input class="checkbox radiomark" type="radio" :value="props.value" :name="props.name" v-model="props.modelValue" @change="emits('update:modelValue', props.modelValue)" />
			<div class="checkmark radiomark">
				<IconRadiomark v-if="checked" />
			</div>
			<Label v-if="props.label" :name="props.name" :text="props.label"><slot></slot></Label>
		</div>
	</div>
</template>

<script setup>
import { computed } from 'vue'
import IconRadiomark from './icons/IconRadiomark.vue'
import Label from './Label.vue'

const emits = defineEmits(['update:modelValue', 'change'])
const props = defineProps({
	name: { type: String },
	modelValue: { default: '' },
	value: { type: String, required: true },
	label: { type: String, required: true },
})

const checked = computed(() => {
	return props.value == props.modelValue
})
</script>

<style>
@import './css/input-root.css';
</style>

<style scoped>
@import './css/input.css';
</style>

<!--

  // Value '' or 'Cherry'
  let radio = ref('')

  <Radiobox label="Banan" value="Banan" v-model="radio" name="radio" />
  <Radiobox label="Melon" value="Melon" v-model="radio" name="radio" />
  <Radiobox label="Cherry" value="Cherry" v-model="radio" name="radio" />

-->
