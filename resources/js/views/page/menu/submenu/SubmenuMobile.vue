<script setup>
import SubLink from './SubLinkMobile.vue'
const props = defineProps(['items'])
</script>
<template>
	<div class="mobile-submenu-menu">
		<SubLink v-for="item in props.items" :url="item.url" :title="$t(item.title)" :subtitle="$t(item.subtitle)" />
	</div>
</template>
