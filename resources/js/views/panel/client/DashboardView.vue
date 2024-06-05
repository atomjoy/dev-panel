<script setup>
import { onBeforeMount, computed, ref } from 'vue'
import { useAuthStore } from '@/stores/auth.js'
import ClientMenu from './menu/ClientMenu.vue'
const auth = useAuthStore()
const user = auth.getUser
</script>
<template>
	<ClientMenu title="Pulpit" icon="fa-solid fa-desktop">
		<div class="page">
			<div class="pulpit__wrapper">
				<div class="pulpit__title">{{ $t('Pulpit') }}</div>
				<h1>{{ $t('Welcome') }} {{ user.name }}!</h1>
				<!-- <i class="fas fa-chevron-down"></i> -->
			</div>
		</div>
	</ClientMenu>
</template>

<style>
@import '@/assets/css/panel/client/client.css';
</style>
