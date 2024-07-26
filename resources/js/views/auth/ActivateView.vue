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

const { t, locale } = useI18n({ useScope: 'global' })
const store = useAuthStore()
const route = useRoute()

onMounted(() => {
	store.clearError()
	if (route.query.locale) {
		locale.value = route.query.locale
		store.changeLocale(route.query.locale)
	}
	store.activateUser(route.params.id, route.params.code)
})
</script>

<template>
	<PageTitle :title="$t('message.activate_title')" />

	<div id="app__scrollbar" class="scrollbar-thin">
		<div id="page-wraper">
			<div class="page-auth">
				<div class="top-bar">
					<AuthLogo />
					<ChangeLocale />
					<ChangeTheme />
				</div>
				<div class="form-wraper">
					<form class="form-auth">
						<h1 class="full">
							{{ $t('activate.Activation') }}
						</h1>

						<div v-if="store.getMessage.value != null" :class="[store.getError.value ? 'alert-error' : 'alert-info', 'animate__animated animate__flipInX']">
							{{ store.getMessage.value }}
						</div>

						<div class="full">
							<p class="alert-default">{{ $t('activate.Description') }}</p>
						</div>

						<div class="full mb">
							<router-link to="/login" class="link-left">{{ $t('activate.Have_an_account') }}</router-link>
							<router-link to="/password" class="link-right">{{ $t('activate.Forgot_password') }}</router-link>
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

.mb {
	margin-bottom: 20px;
}
</style>
