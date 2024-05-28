<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
	<div class="policy-bar">
		<router-link to="/docs/policy" class="link-docs" target="_blank" :title="$t('docs.Policy')">
			{{ $t('docs.Policy') }}
		</router-link>
		|
		<router-link to="/docs/services" class="link-docs" target="_blank" :title="$t('docs.Services')">
			{{ $t('docs.Services') }}
		</router-link>
		|
		<router-link to="/support" class="link-docs" target="_blank" :title="$t('docs.Support')">
			{{ $t('docs.Support') }}
		</router-link>
	</div>
</template>

<style scoped>
@import '@/assets/css/auth.css';
</style>
