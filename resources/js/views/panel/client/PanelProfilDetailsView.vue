<script setup>
import ClientMenu from './menu/ClientMenu.vue'
import ErrorMessage from './page/ErrorMessage.vue'
import Input from '@/components/input/Input.vue'
import Button from '@/components/input/Button.vue'
import Textarea from '@/components/input/Textarea.vue'
import { useAuthStore } from '@/stores/auth.js'
import { onBeforeMount, computed, ref } from 'vue'
import LinksMobile from './page/LinksMobile.vue'
import LinksPage from './page/LinksPage.vue'

const auth = useAuthStore()
const user = auth.getUser

let name = ref('')
let username = ref('')
let location = ref('')
let bio = ref('')

onBeforeMount(() => {
	auth.clearError()
})

let userName = computed({
	get() {
		return user.value?.profile?.name ?? ''
	},
	set(val) {
		name.value = val
	},
})

let userUsername = computed({
	get() {
		return user.value?.profile?.username ?? ''
	},
	set(val) {
		username.value = val
	},
})

let userLocation = computed({
	get() {
		return user.value?.profile?.location ?? ''
	},
	set(val) {
		location.value = val
	},
})

let userBio = computed({
	get() {
		return user.value?.profile?.bio ?? ''
	},
	set(val) {
		bio.value = val
	},
})

function onSubmitDetails(e) {
	let data = new FormData(e.target)
	// for (var pair of data.entries()) { console.log('Input key:', pair[0], 'Value:', pair[1]) }
	auth.changeUserProfil(data)
	auth.scrollTop()
}

console.log(user.value?.profile)
</script>
<template>
	<ClientMenu>
		<div class="page">
			<div class="page__menu">
				<span>{{ $t('Profile') }}</span>
				<div class="page-menu__nav">
					<LinksMobile />
				</div>
			</div>

			<div class="page__wrapper">
				<div class="page__menu-left">
					<div class="page-menu__title">{{ $t('Profile') }}</div>
					<LinksPage />
				</div>
				<div class="page__content">
					<div class="page-content__title">
						<i class="fa-solid fa-circle-info"></i>
						<span class="submenu__title">{{ $t('Detail settings') }}</span>
					</div>
					<p class="page-content__desc">{{ $t('Update your profile details here.') }}</p>

					<ErrorMessage />

					<h4 class="h4-title">{{ $t('Profile details') }}</h4>
					<form @submit.prevent="onSubmitDetails" method="post" class="label-color client-panel-form">
						<Input name="name" :label="$t('Name')" v-model="userName" :placeholder="$t('Enter name')" />
						<Input name="username" :label="$t('Username')" v-model="userUsername" :placeholder="$t('Enter username')" />
						<Input name="location" :label="$t('Location')" v-model="userLocation" :placeholder="$t('Enter location')" />
						<Textarea name="bio" :label="$t('Bio')" v-model="userBio" :placeholder="$t('Enter bio')" />
						<Button :text="$t('Update')" />
					</form>
				</div>
			</div>
		</div>
	</ClientMenu>
</template>

<style>
@import '@/assets/css/panel/client/client.css';
</style>
