<script setup>
import TopMenu from './menu/TopMenu.vue'
import TopMenuMobile from './menu/TopMenuMobile.vue'
</script>

<template>
	<TopMenu />
	<TopMenuMobile />
	<div class="section">
		<div class="section__wrapper">
			<h1>{{ $t('Support') }}</h1>
			<p>{{ $t('Laravel 11 Vue 3.4 Starter SPA with router.') }}</p>
		</div>
	</div>
</template>
