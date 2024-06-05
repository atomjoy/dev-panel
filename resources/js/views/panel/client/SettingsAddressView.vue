<script setup>
import Input from '@/components/input/Input.vue'
import Button from '@/components/input/Button.vue'
import ClientMenu from './menu/ClientMenu.vue'
import ErrorMessage from './page/ErrorMessage.vue'
import LinksMobileSettings from './page/LinksMobileSettings.vue'
import LinksPageSettings from './page/LinksPageSettings.vue'
import { useAuthStore } from '@/stores/auth.js'
import { onBeforeMount, computed, ref } from 'vue'

const auth = useAuthStore()
const user = auth.getUser

let country = ref('')
let state = ref('')
let city = ref('')
let street = ref('')
let postal_code = ref('')

let userCountry = computed({
	get() {
		return user.value?.address?.country ?? ''
	},
	set(newValue) {
		country.value = newValue
	},
})

let userState = computed({
	get() {
		return user.value?.address?.state ?? ''
	},
	set(val) {
		state.value = val
	},
})

let userCity = computed({
	get() {
		return user.value?.address?.city ?? ''
	},
	set(val) {
		city.value = val
	},
})

let userLine1 = computed({
	get() {
		return user.value?.address?.line1 ?? ''
	},
	set(val) {
		street.value = val
	},
})

let userLine2 = computed({
	get() {
		return user.value?.address?.line2 ?? ''
	},
	set(val) {
		street.value = val
	},
})

let userPostalCode = computed({
	get() {
		return user.value?.address?.postal_code ?? ''
	},
	set(val) {
		postal_code.value = val
	},
})

onBeforeMount(() => {
	auth.clearError()
})

function onSubmitDetails(e) {
	auth.scrollTop()
	auth.changeUserAddress(new FormData(e.target))
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
						<i class="fa-solid fa-address-card"></i>
						<span class="submenu__title">{{ $t('Address settings') }}</span>
					</div>
					<p class="page-content__desc">{{ $t('Update your address here.') }}</p>

					<ErrorMessage />

					<h4 class="h4-title">{{ $t('Home address') }}</h4>
					<form @submit.prevent="onSubmitDetails" method="post" class="label-color client-panel-form">
						<Input name="line1" :label="$t('Line 1')" v-model="userLine1" :placeholder="$t('Enter first line')" />
						<Input name="line2" :label="$t('Line 2')" v-model="userLine2" :placeholder="$t('Enter second line')" />
						<Input name="city" :label="$t('City')" v-model="userCity" :placeholder="$t('Enter city')" />
						<Input name="postal_code" :label="$t('Postal code')" v-model="userPostalCode" :placeholder="$t('Enter postal code')" />
						<Input name="state" :label="$t('State')" v-model="userState" :placeholder="$t('Enter state')" />
						<Input name="country" :label="$t('Country')" v-model="userCountry" :placeholder="$t('Enter country')" />
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
