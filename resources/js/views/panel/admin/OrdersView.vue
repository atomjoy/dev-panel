<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'
import { useAuthStore } from '@/stores/auth.js'
import PageTitle from '@/components/utils/ChangeTitle/ChangeTitle.vue'

const auth = useAuthStore()
const user = auth.getUser

let name = ref(user.value?.name ?? '')
</script>

<template>
	<div id="app__scrollbar" class="scrollbar-thin">
		<PageTitle title="Orders" />

		<h1>Admin Orders</h1>
		<h2>{{ name }}</h2>
		<RouterLink to="/admin/panel" class="link">Admin Dashboard</RouterLink>
		<RouterLink to="/admin/logout" class="link">Logout Admin</RouterLink>
	</div>
</template>

<style scoped>
.link {
	padding: 10px;
}
</style>
