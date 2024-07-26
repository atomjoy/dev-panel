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
	store.confirmUserEmail(route.params.id, route.params.code)
})
</script>

<template>
	<PageTitle :title="$t('message.change_email_title')" />

	<div id="app__scrollbar" class="scrollbar-page">
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
							{{ $t('change_email.Confirm') }}
						</h1>

						<div v-if="store.getMessage.value != null" :class="[store.getError.value ? 'alert-error' : 'alert-info', 'animate__animated animate__flipInX']">
							{{ store.getMessage.value }}
						</div>

						<div class="full mb">
							<p class="alert-default">{{ $t('change_email.Description') }}</p>
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
