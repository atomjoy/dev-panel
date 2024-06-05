<script setup>
import Input from '@/components/input/Input.vue'
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

function onSubmitEmail(e) {
	auth.scrollTop()
	auth.changeUserEmail(new FormData(e.target))
}

function onSubmitF2a(e) {
	auth.scrollTop()

	if (user.value.f2a == 1) {
		auth.disableF2a(new FormData(e.target))
	} else {
		auth.enableF2a(new FormData(e.target))
	}
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
						<i class="fa-solid fa-user"></i>
						<span class="submenu__title">{{ $t('Account settings') }}</span>
					</div>
					<p class="page-content__desc">{{ $t('Update your account details here.') }}</p>

					<ErrorMessage />

					<h4 class="h4-title">{{ $t('Change account email') }}</h4>
					<form @submit.prevent="onSubmitEmail" method="post" class="label-color client-panel-form">
						<Input name="email" :label="$t('Email address')" v-model="user.email" :placeholder="$t('Enter email address')" />
						<Button :text="$t('Update')" />
					</form>

					<h4 class="h4-title">{{ $t('Two factor authentication') }}</h4>
					<form @submit.prevent="onSubmitF2a" method="post" class="label-color client-panel-form">
						<div v-if="user.f2a == 1" class="f2a-enabled">{{ $t('Enabled') }}</div>
						<div v-if="user.f2a == 0" class="f2a-disabled">{{ $t('Disabled') }}</div>
						<Password name="password_current" :label="$t('Current password')" :placeholder="$t('Enter current password')" />
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
