<script setup>
import { useRouter, useRoute } from 'vue-router'
import { RouterLink } from 'vue-router'
import { onMounted, ref } from 'vue'
import { useI18n } from 'vue-i18n'
import { useAuthStore } from '@/stores/auth.js'
import ChangeTheme from '@/components/utils/ChangeTheme/ChangeTheme.vue'
import ChangeLocale from '@/components/utils/ChangeLocale/ChangeLocale.vue'
import PageTitle from '@/components/utils/ChangeTitle/ChangeTitle.vue'
import Password from '@/components/input/Password.vue'
import Checkbox from '@/components/input/Checkbox.vue'
import Input from '@/components/input/Input.vue'
import PolicyBar from './PolicyBar.vue'
import AuthLogo from './AuthLogo.vue'
import SocialLogin from './SocialLogin.vue'

const { t, locale } = useI18n({ useScope: 'global' })
const store = useAuthStore()
let email = ref('')
let password = ref('')
let remember_me = ref(false)

onMounted(() => {
	store.clearError()
	store.changeLocale(locale.value)
	// Route
	// const route = useRoute()
	// console.log('Query params', route?.query)
})

function onSubmit(e) {
	store.scrollTop()
	store.loginUser(new FormData(e.target))
}
</script>

<template>
	<PageTitle :title="$t('message.login_title')" />

	<div id="app__scrollbar" class="scrollbar-page">
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
							{{ $t('login.Sign_In') }}
						</h1>

						<SocialLogin />

						<div v-if="store.getMessage.value != null" :class="[store.getError.value ? 'alert-error' : 'alert-info', 'animate__animated animate__flipInX']">
							{{ store.getMessage.value }}
						</div>

						<Input :focus="'true'" type="text" name="email" v-model="email" :placeholder="$t('login.Email_address_eg')" :label="$t('login.Email_address')">
							<i class="far fa-envelope"></i>
						</Input>

						<Password type="password" name="password" v-model="password" :placeholder="$t('login.Password_eg')" :label="$t('login.Password')">
							<i class="fa-solid fa-key"></i>
						</Password>

						<div class="full">
							<Checkbox :label="$t('login.Remember_me')" value="1" v-model="remember_me" name="remember_me" />
						</div>

						<button class="button" :title="$t('login.Login')" ref="button">
							{{ $t('login.Login') }}
						</button>

						<div class="full">
							<router-link to="/register" class="link-left">{{ $t('login.Dont_have_an_account') }}</router-link>
							<router-link to="/password" class="link-right">{{ $t('login.Forgot_password') }}</router-link>
						</div>
					</form>
				</div>
			</div>

			<PolicyBar />
		</div>
	</div>
</template>

<style scoped>
@import '@/assets/css/auth.css';
</style>
