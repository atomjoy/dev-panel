<script setup>
import SubLink from './SubLink.vue'
const props = defineProps(['url', 'title', 'items'])
</script>
<template>
	<div class="popover__menu">
		<RouterLink :to="props.url" class="main-header__navlink" :title="$t(props.title)" role="menuitem">{{ $t(props.title) }} <i class="fas fa-chevron-down rotate__chevron"></i> </RouterLink>
		<div class="popover__submenu">
			<SubLink v-for="item in props.items" :url="item.url" :title="$t(item.title)" :subtitle="$t(item.subtitle)" />
		</div>
	</div>
</template>
