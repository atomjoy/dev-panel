<script setup>
import Label from './Label.vue'

const emits = defineEmits(['update:modelValue'])
const props = defineProps({
	modelValue: [String, Number],
	name: { type: String },
	label: { type: String },
	placeholder: { type: String },
	class: { type: [String, Array] },
})
</script>
<template>
	<div class="input-group">
		<Label v-if="props.label" :name="props.name" :text="props.label"><slot></slot></Label>
		<textarea :name="props.name" v-model="props.modelValue" :class="props.class" :placeholder="props.placeholder" @input="emits('update:modelValue', $event.target.value)"></textarea>
	</div>
</template>

<style>
@import './css/input-root.css';
</style>

<style scoped>
@import './css/input.css';
</style>

<!--

  import Textarea from '@/components/form/Textarea.vue'

  let textarea = ''

  <Textarea name="desc" v-model="textarea" placeholder="Some text" label="Description" />

-->
