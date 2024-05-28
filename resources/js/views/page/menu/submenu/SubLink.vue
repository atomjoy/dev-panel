<script setup>
const props = defineProps(['url', 'title', 'subtitle'])
</script>

<template>
	<div class="submenu__sublink">
		<RouterLink :to="props.url" :title="$t(props.title)" role="menuitem">
			<span class="main-header__sublink">{{ $t(props.title) }}</span>
			<p class="main-header__subtitle">{{ $t(props.subtitle) }}</p>
		</RouterLink>
	</div>
</template>
