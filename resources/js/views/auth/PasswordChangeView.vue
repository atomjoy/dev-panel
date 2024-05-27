<script setup>
import { useRouter, useRoute } from 'vue-router'
import { RouterLink } from 'vue-router'
import { onMounted, ref } from 'vue'
import { useI18n } from 'vue-i18n'
import { useAuthStore } from '@/stores/auth.js'
import ChangeTheme from '@/components/utils/ChangeTheme/ChangeTheme.vue'
import ChangeLocale from '@/components/utils/ChangeLocale/ChangeLocale.vue'
import PageTitle from '@/components/utils/ChangeTitle/ChangeTitle.vue'
import PolicyBar from './PolicyBar.vue'
import AuthLogo from './AuthLogo.vue'
import Password from '@/components/input/Password.vue'

const { t, locale } = useI18n({ useScope: 'global' })
const store = useAuthStore()
let password = ref('')
let password_current = ref('')
let password_confirmation = ref('')

onMounted(() => {
	store.clearError()
})

function onSubmit(e) {
	store.scrollTop()
	store.changeUserPassword(new FormData(e.target))
}
</script>

<template>
	<PageTitle :title="$t('message.change_password_title')" />

	<div id="page-wraper">
		<div class="page-auth">
			<div class="top-bar">
				<AuthLogo />
				<ChangeLocale />
				<ChangeTheme />
			</div>
			<div class="form-wraper">
				<form @submit.prevent="onSubmit" class="form-auth">
					<h1 class="full">
						{{ $t('change_password.Change_password') }}
					</h1>

					<div
						v-if="store.getMessage.value != null"
						:class="[
							store.getError.value ? 'alert-error' : 'alert-info',
							'animate__animated animate__flipInX',
						]">
						{{ store.getMessage.value }}
					</div>

					<Password
						:focus="'true'"
						type="password"
						name="password_current"
						v-model="password_current"
						:placeholder="$t('change_password.Current_password')"
						:label="$t('change_password.Current_password')">
						<i class="fa-solid fa-key"></i>
					</Password>

					<Password
						type="password"
						name="password"
						v-model="password"
						:placeholder="$t('change_password.New_password')"
						:label="$t('change_password.New_password')">
						<i class="fa-solid fa-key"></i>
					</Password>

					<Password
						type="password"
						name="password_confirmation"
						v-model="password_confirmation"
						:placeholder="$t('change_password.Confirm_password')"
						:label="$t('change_password.Confirm_password')">
						<i class="fa-solid fa-key"></i>
					</Password>

					<div class="full">
						<button class="button" :title="$t('change_password.Change')">
							{{ $t('change_password.Change') }}
						</button>
					</div>

					<div class="full">
						<router-link to="/login" class="link-left">{{
							$t('change_password.Have_an_account')
						}}</router-link>
						<router-link to="/password" class="link-right">{{
							$t('change_password.Forgot_password')
						}}</router-link>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<style scoped>
@import '@/assets/css/auth.css';
</style>
