<script setup>
const props = defineProps(['url', 'title', 'subtitle'])
</script>

<template>
	<div class="submenu__sublink">
		<RouterLink :to="props.url" :title="$t(props.title)" role="menuitem">
			<span class="main-header__navlink-mobile--small">{{ $t(props.title) }}</span>
			<p class="main-header__navlink-mobile--subtitle">{{ $t(props.subtitle) }}</p>
		</RouterLink>
	</div>
</template>
