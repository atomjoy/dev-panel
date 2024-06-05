<script setup>
import ClientMenu from './menu/ClientMenu.vue'
import ErrorMessage from './page/ErrorMessage.vue'
import Button from '@/components/input/Button.vue'
import AvatarInput from '@/components/input/AvatarInput.vue'
import { useAuthStore } from '@/stores/auth.js'
import { onBeforeMount, computed, ref } from 'vue'
import LinksMobile from './page/LinksMobile.vue'
import LinksPage from './page/LinksPage.vue'
const auth = useAuthStore()
const user = auth.getUser

let userAvatar = computed({
	get() {
		return user.value?.profile?.avatar ?? ''
	},
	set(val) {
		avatar.value = val
	},
})

function onSubmitAvatar(e) {
	auth.changeUserAvatar(new FormData(e.target))
	auth.scrollTop()
}
</script>
<template>
	<ClientMenu>
		<div class="page">
			<div class="page__menu">
				<span>{{ $t('Profil') }}</span>
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
						<i class="fa-regular fa-circle-user"></i>
						<span class="submenu__title">{{ $t('Avatar settings') }}</span>
					</div>
					<p class="page-content__desc">{{ $t('Upload your avatar image here.') }}</p>

					<ErrorMessage />

					<h4 class="h4-title">{{ $t('Upload avatar') }}</h4>
					<form @submit.prevent="onSubmitAvatar" method="post" enctype="multipart/form-data" class="label-color client-panel-form">
						<AvatarInput :label="$t('Select image')" :avatar="userAvatar" />
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
