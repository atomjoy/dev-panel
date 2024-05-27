<script setup>
import { RouterLink } from 'vue-router'
</script>
<template>
	<router-link to="/" :title="$t('Home_title')">
		<img class="float-left auth-logo" src="@/assets/images/logo-light.png" height="50" />
	</router-link>
</template>

<style>
[color-scheme='dark'] {
	color-scheme: dark;
	--logo: url('@/assets/images/logo-dark.png');
}
</style>

<style scoped>
@import '@/assets/css/auth.css';
</style>
