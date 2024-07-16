<script setup>
import TopMenu from './menu/TopMenu.vue'
import TopMenuMobile from './menu/TopMenuMobile.vue'
</script>

<template>
	<div id="app__scrollbar" class="scrollbar-page">
		<TopMenu />
		<TopMenuMobile />
		<div class="section">
			<div class="section__wrapper">
				<h1 class="animate__animated animate__flipInX"><i class="fa-brands fa-vuejs"></i> Laravel Vue Starter SPA</h1>
				<p>{{ $t('Laravel 11 Vue 3.4 Starter SPA with router.') }}</p>
			</div>
		</div>
	</div>
</template>
