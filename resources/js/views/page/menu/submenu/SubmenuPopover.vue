<script setup>
import { RouterLink } from 'vue-router'
import SubLink from './SubLink.vue'
const props = defineProps(['url', 'title', 'items'])
</script>
<template>
	<div class="popover__menu">
		<RouterLink class="main-header__navlink" :to="props.url" :title="$t(props.title)" role="menuitem">{{ $t(props.title) }} <i class="fas fa-chevron-down rotate__chevron" v-if="props.items.length > 0"></i> </RouterLink>

		<div class="popover__submenu" v-if="props.items.length > 0">
			<SubLink v-for="item in props.items" :url="item.url" :title="$t(item.title)" :subtitle="$t(item.subtitle)" />
		</div>
	</div>
</template>
