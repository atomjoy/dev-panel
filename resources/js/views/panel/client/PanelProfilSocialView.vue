<script setup>
import ClientMenu from './menu/ClientMenu.vue'
import ErrorMessage from './page/ErrorMessage.vue'
import Input from '@/components/input/Input.vue'
import Select from '@/components/input/Select.vue'
import Button from '@/components/input/Button.vue'
import { useAuthStore } from '@/stores/auth.js'
import { onBeforeMount, ref } from 'vue'
import LinksMobile from './page/LinksMobile.vue'
import LinksPage from './page/LinksPage.vue'

const auth = useAuthStore()
let user = auth.getUser

const social = ref(user.value.social ?? [])
let icon = ref(null)
let name = ref('')
let url = ref('')
let options = []

// let options = ['fa-brands fa-youtube', 'fa-brands fa-facebook', 'fa-brands fa-x-twitter', 'fa-brands fa-instagram', 'fa-brands fa-pinterest', 'fa-brands fa-dribbble', 'fa-brands fa-tiktok', 'fa-brands fa-twitch', 'fa-brands fa-discord', 'fa-brands fa-linkedin', 'fa-brands fa-kickstarter', 'fa-brands fa-vimeo', 'fa-brands fa-behance', 'fa-brands fa-soundcloud', 'fa-brands fa-napster', 'fa-brands fa-spotify', 'fa-brands fa-tumblr', 'fa-brands fa-medium', 'fa-brands fa-dev', 'fa-brands fa-snapchat', 'fa-brands fa-whatsapp']
let option_list = ['artstation', 'btc', 'ethereum', 'xbox', 'playstation', 'patreon', 'earlybirds', 'digg', 'shopify', 'mailchimp', 'skype', 'linux', 'viber', 'threads', 'upwork', 'qq', 'optin-monster', 'weebly', 'unity', 'rebel', 'galactic-republic', 'old-republic', 'jedi-order', 'steam', 'bluesky', 'gitlab', 'weibo', 'youtube', 'facebook', 'x-twitter', 'instagram', 'pinterest', 'dribbble', 'tiktok', 'twitch', 'discord', 'linkedin', 'kickstarter', 'vimeo', 'behance', 'soundcloud', 'napster', 'spotify', 'tumblr', 'medium', 'dev', 'snapchat', 'whatsapp', 'phoenix-squadron']

option_list.sort((a, b) => a.localeCompare(b))

options.push({
	key: 'fa-solid fa-link',
	value: '<i class="fa-solid fa-link"></i> Website',
})

options.push({
	key: 'fa-solid fa-store',
	value: '<i class="fa-solid fa-store"></i> Store',
})

option_list.forEach((item) => {
	options.push({
		key: 'fa-brands fa-' + item,
		value: '<i class="fa-brands fa-' + item + '"></i> ' + item,
	})
})

onBeforeMount(() => {
	auth.clearError()
})

async function onSubmitDetails(e) {
	let data = new FormData(e.target)
	// for (var pair of data.entries()) { console.log('Input key:', pair[0], 'Value:', pair[1]) }
	await auth.changeUserSocial(data)
	social.value = user.value.social
	auth.scrollTop()
	document.getElementById('form').reset()
}

async function deleteLink(id) {
	await auth.changeUserSocialDelete(id)
	social.value = user.value.social.filter((x) => x.id != id)
}

function moveUp(index) {
	move(user.value.social, index, -1)
	social.value = user.value.social
	auth.changeUserSocialSort(social.value)
}

function moveDown(index) {
	move(user.value.social, index, 1)
	social.value = user.value.social
	auth.changeUserSocialSort(social.value)
}

function move(array, index, delta) {
	let newIndex = index + delta
	if (newIndex < 0 || newIndex == array.length) return
	let indexes = [index, newIndex].sort((a, b) => a - b)
	array.splice(indexes[0], 2, array[indexes[1]], array[indexes[0]])
}

console.log('Social', social)
</script>
<template>
	<ClientMenu>
		<div class="page">
			<div class="page__menu">
				<span>{{ $t('Profile') }}</span>
				<div class="page-menu__nav">
					<LinksMobile />
				</div>
			</div>

			<div class="page__wrapper">
				<div class="page__menu-left">
					<div class="page-menu__title">{{ $t('Profile') }}</div>
					<LinksPage />
				</div>
				<div class="page__content">
					<div class="page-content__title">
						<i class="fa-regular fa-thumbs-up"></i>
						<span class="submenu__title">{{ $t('Social settings') }}</span>
					</div>
					<p class="page-content__desc">{{ $t('Update social links here.') }}</p>

					<ErrorMessage />

					<h4 class="h4-title">{{ $t('Update link by name') }}</h4>
					<form id="form" @submit.prevent="onSubmitDetails" method="post" class="label-color client-panel-form">
						<Input name="name" :label="$t('Name')" v-model="name" :placeholder="$t('Enter name')" />
						<Select v-model="icon" :search="false" :placeholder="$t('No icon')" label="Icon" name="icon" :options="options" />
						<Input name="url" :label="$t('Url')" v-model="url" :placeholder="$t('Enter url')" />
						<Button :text="$t('Update')" />
					</form>

					<h4 class="h4-title">{{ $t('Social links') }}</h4>
					<div class="social__links">
						<div class="empty__list" v-if="social.length == 0">{{ $t('Add more links.') }}</div>
						<div class="social-link__box" v-for="(i, index) in social" :id="'link' + i.id">
							<div class="social-link__top">
								<a :href="i.url" :title="i.url" class="social-link__href" target="_blank"><i v-if="i.icon" :class="i.icon"></i> {{ i.name }}</a>

								<i class="fas fa-chevron-up social-link__up" @click="moveUp(index)"></i>
								<i class="fas fa-chevron-down social-link__down" @click="moveDown(index)"></i>
								<i class="fa-regular fa-circle-xmark social-link__delete" @click="deleteLink(i.id)"></i>
							</div>
							<div class="social-link__bottom">{{ i.url }}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</ClientMenu>
</template>

<style>
@import '@/assets/css/panel/client/client.css';
</style>
