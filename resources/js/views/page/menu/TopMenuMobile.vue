<script setup>
import { RouterLink } from 'vue-router'
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth.js'
import ChangeLocale from '@/components/utils/ChangeLocale/ChangeLocale.vue'
import ChangeTheme from '@/components/utils/ChangeTheme/ChangeTheme.vue'
import ProfilMenu from '@/components/notify/ProfilMenu/ProfilMenu.vue'
import SubLink from './submenu/SubLinkMobile.vue'
import SubmenuMobile from './submenu/SubmenuMobile.vue'

const auth = useAuthStore()
const logged = auth.isLoggedIn.value
const user = auth.getUser
const open = ref(false)

function openMenue() {
	open.value = !open.value
	const el = document.querySelector('.main-mobile-header')
	el.classList.toggle('main-mobile-header-fixed')
}

const homeItems = [
	{ url: '/service1', title: 'Service 1', subtitle: 'Service 1 description' },
	{ url: '/service2', title: 'Service 2', subtitle: 'Service 2 description' },
	{ url: '/service3', title: 'Service 3', subtitle: 'Service 3 description' },
	{ url: '/service4', title: 'Service 4', subtitle: 'Service 4 description' },
]
</script>

<template>
	<div class="main-mobile-header">
		<div class="main-mobile-header__top">
			<div class="main-header__logo">
				<a href="/" class="main-header__logo-link" aria-label="homepage">
					<img class="main-header__logo-image" alt="Logo" src="/logo/logo-light.png" />
				</a>
			</div>
			<div class="main-header__nav-container">
				<nav class="main-header__nav" role="menubar">
					<span v-if="!open" id="open-mobile-menu" @click="openMenue">
						<i class="fa-solid fa-bars"></i>
					</span>
					<span v-if="open" id="open-mobile-menu" @click="openMenue">
						<i class="fa-solid fa-times"></i>
					</span>
				</nav>
				<div class="main-header__nav-right" role="presentation">
					<ChangeTheme />
					<ChangeLocale />
					<ProfilMenu :logged="logged" :profil="true" :name="user?.profile?.name" :email="user?.email" :avatar="user?.profile?.avatar" />
				</div>
			</div>
		</div>

		<nav v-if="open" class="main-header__nav-mobile main-mobile-header-closed" role="menubar">
			<RouterLink to="/" class="main-header__navlink-mobile" :title="$t('Home')" role="menuitem">{{ $t('Home') }}</RouterLink>
			<SubmenuMobile :items="[]" />

			<RouterLink to="/services" class="main-header__navlink-mobile" :title="$t('Services')" role="menuitem">{{ $t('Services') }}</RouterLink>
			<SubmenuMobile :items="homeItems" />

			<RouterLink to="/about" class="main-header__navlink-mobile" :title="$t('About')" role="menuitem">{{ $t('About') }}</RouterLink>
			<SubmenuMobile :items="homeItems" />

			<RouterLink to="/support" class="main-header__navlink-mobile" :title="$t('Support')" role="menuitem">{{ $t('Support') }}</RouterLink>
			<SubmenuMobile :items="homeItems" />
		</nav>
	</div>
</template>

<style>
#open-mobile-menu {
	cursor: pointer;
	font-size: 25px;
}

.mobile-submenu-menu {
	float: left;
	width: 90%;
	margin: 0px 5%;
	padding: 0px 30px;
	border-left: 1px solid var(--divider-primary);
}

.main-header__navlink-mobile--small {
	font-size: 14px;
	font-weight: 500;
	color: var(--text-primary);
}

.main-header__navlink-mobile--small:hover {
	color: var(--accent-primary);
}

.main-header__navlink-mobile--subtitle {
	color: var(--text-light-primary);
	font-size: 13px;
	margin: 0px;
}

.main-mobile-header {
	display: inherit;
	float: left;
	width: 100vw;
	min-height: 60px;
	height: auto;
	max-height: 100%;
	color: var(--text-primary);
	background: var(--bg-primary);
	z-index: var(--z-index-menu);
	display: flex;
	flex-direction: column;
}

.main-header__navlink-mobile {
	position: relative;
	float: left;
	width: 94%;
	margin: 5px 3%;
	padding: 10px 30px;
	font-size: 15px;
	color: var(--text-primary);
}
.main-header__navlink-mobile::before {
	content: '';
	position: absolute;
	left: 11px;
	top: 18px;
	width: 7px;
	height: 7px;
	border: 2px dashed var(--text-primary);
	z-index: 1;
}

.main-header__navlink-mobile:hover {
	color: var(--accent-primary);
	border-color: var(--accent-primary);
}
.main-mobile-header__top {
	border-bottom: var(--divider-primary);
}

.main-header__nav-mobile {
	float: left;
	width: calc(100% - var(--scrollbar-width, 10px));
	border-top: 1px solid var(--divider-primary);
	transition: all 0.5s;
	padding-top: 20px;
	padding-bottom: 100px;
	overflow-y: scroll;
	scrollbar-width: thin;
}

.main-mobile-header-fixed {
	position: fixed;
	min-height: 100%;
}

@media all and (min-width: 1024px) {
	.main-mobile-header {
		display: none;
	}
}
@media all and (max-width: 1024px) {
	.main-header {
		display: none;
	}
}
</style>
