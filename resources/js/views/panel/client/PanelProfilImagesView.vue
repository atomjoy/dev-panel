<script setup>
import ClientMenu from './menu/ClientMenu.vue'
import ErrorMessage from './page/ErrorMessage.vue'
import Button from '@/components/input/Button.vue'
import ProfilInput from '@/components/input/ProfilInput.vue'
import { useAuthStore } from '@/stores/auth.js'
import { computed } from 'vue'
import LinksMobile from './page/LinksMobile.vue'
import LinksPage from './page/LinksPage.vue'
const auth = useAuthStore()
const user = auth.getUser

let userImage = computed({
	get() {
		return user.value?.profile?.banner ?? ''
	},
	set(val) {
		avatar.value = val
	},
})

function onSubmitImage(e) {
	auth.changeUserBanner(new FormData(e.target))
	auth.scrollTop()
}
</script>
<template>
	<ClientMenu>
		<div class="page">
			<div class="page__menu">
				<span>{{ $t('Profil') }}</span>
				<!-- <i class="fas fa-chevron-down"></i> -->
				<div class="page-menu__nav">
					<LinksMobile />
				</div>
			</div>

			<div class="page__wrapper">
				<div class="page__menu-left">
					<div class="page-menu__title">{{ $t('Profil') }}</div>
					<LinksPage />
				</div>
				<div class="page__content">
					<div class="page-content__title">
						<i class="fa-regular fa-user"></i>
						<span class="submenu__title">{{ $t('Banner settings') }}</span>
					</div>
					<p class="page-content__desc">{{ $t('Upload your banner image here.') }}</p>

					<ErrorMessage />

					<h4 class="h4-title">{{ $t('Upload profil banner') }}</h4>
					<form @submit.prevent="onSubmitImage" method="post" enctype="multipart/form-data" class="label-color">
						<ProfilInput :label="$t('Select image')" :profile="userImage" />
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
