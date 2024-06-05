<script setup>
import Input from '@/components/input/Input.vue'
import Password from '@/components/input/Password.vue'
import Button from '@/components/input/Button.vue'
import ClientMenu from './menu/ClientMenu.vue'
import ErrorMessage from './page/ErrorMessage.vue'
import LinksMobileSettings from './page/LinksMobileSettings.vue'
import LinksPageSettings from './page/LinksPageSettings.vue'
import { useAuthStore } from '@/stores/auth.js'
import { onBeforeMount, ref } from 'vue'

const auth = useAuthStore()
let password = ref('')
let password_current = ref('')
let password_confirmation = ref('')

onBeforeMount(() => {
	auth.clearError()
})

function onSubmit(e) {
	auth.scrollTop()
	auth.changeUserPassword(new FormData(e.target))
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
						<i class="fa-solid fa-key"></i>
						<span class="submenu__title">{{ $t('Password settings') }}</span>
					</div>
					<p class="page-content__desc">{{ $t('Update your account details here.') }}</p>

					<ErrorMessage />

					<h4 class="h4-title">{{ $t('Change account email') }}</h4>
					<form @submit.prevent="onSubmit" method="post" class="label-color client-panel-form">
						<TitleH2 :title="$t('Change password')" />
						<Password name="password_current" :label="$t('Current password')" v-model="password_current" :placeholder="$t('Enter current password')" />
						<Password name="password" :label="$t('New password')" v-model="password" :placeholder="$t('Enter new password')" />
						<Password name="password_confirmation" :label="$t('Confirm password')" v-model="password_confirmation" :placeholder="$t('Enter new password again')" />
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
