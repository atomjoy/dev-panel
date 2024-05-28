<script setup>
import { RouterLink } from 'vue-router'
import SubLink from './SubLinkMobile.vue'
const props = defineProps(['url', 'title', 'items'])
</script>
<template>
	<RouterLink class="main-header__navlink-mobile" :to="props.url" :title="$t(props.title)" role="menuitem">{{ $t(props.title) }}</RouterLink>

	<div class="mobile-submenu-menu" v-if="props.items.length > 0">
		<SubLink v-for="item in props.items" :url="item.url" :title="$t(item.title)" :subtitle="$t(item.subtitle)" />
	</div>
</template>
