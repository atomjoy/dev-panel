<script setup>
import Password from '@/components/input/Password.vue'
import Button from '@/components/input/Button.vue'
import ClientMenu from './menu/ClientMenu.vue'
import ErrorMessage from './page/ErrorMessage.vue'
import LinksMobileSettings from './page/LinksMobileSettings.vue'
import LinksPageSettings from './page/LinksPageSettings.vue'
import { useAuthStore } from '@/stores/auth.js'
import { onBeforeMount } from 'vue'

const auth = useAuthStore()
const user = auth.getUser

onBeforeMount(() => {
	auth.clearError()
})

function onSubmit(e) {
	auth.scrollTop()
	auth.deleteUserAccount(new FormData(e.target))
}
</script>
<template>
	<ClientMenu title="Settings" icon="fa-solid fa-gear">
		<div class="page">
			<div class="page__menu">
				<span>{{ $t('Settings') }}</span>
				<div class="page-menu__nav">
					<LinksMobileSettings />
				</div>
			</div>

			<div class="page__wrapper">
				<div class="page__menu-left">
					<div class="page-menu__title">{{ $t('Settings') }}</div>
					<LinksPageSettings />
				</div>
				<div class="page__content">
					<div class="page-content__title">
						<i class="fa-solid fa-user-secret"></i>
						<span class="submenu__title">{{ $t('Delete account settings') }}</span>
					</div>
					<p class="page-content__desc">{{ $t('You can delete your account here.') }}</p>

					<ErrorMessage />

					<h4 class="h4-title">{{ $t('Delete Account') }}</h4>
					<form @submit.prevent="onSubmit" method="post" class="label-color client-panel-form">
						<Password name="current_password" :placeholder="$t('Enter current password')" :label="$t('Current password')" />
						<Button :text="$t('Delete Account Now!')" class="form__button delete-button" />
					</form>
				</div>
			</div>
		</div>
	</ClientMenu>
</template>

<style>
@import '@/assets/css/panel/client/client.css';
</style>
