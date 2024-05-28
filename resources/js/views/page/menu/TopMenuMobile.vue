<script setup>
import { RouterLink } from 'vue-router'
import ChangeLocale from '@/components/utils/ChangeLocale/ChangeLocale.vue'
import ChangeTheme from '@/components/utils/ChangeTheme/ChangeTheme.vue'
import ProfilMenu from '@/components/notify/ProfilMenu/ProfilMenu.vue'
import { useAuthStore } from '@/stores/auth.js'
import { ref } from 'vue'
const auth = useAuthStore()
const logged = auth.isLoggedIn.value
const user = auth.getUser
const open = ref(false)

function openMenue() {
	open.value = !open.value
	const el = document.querySelector('.main-mobile-header')
	el.classList.toggle('main-mobile-header-fixed')
}
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
					<ProfilMenu
						:logged="logged"
						:profil="true"
						:name="user?.profile?.name"
						:email="user?.email"
						:avatar="user?.profile?.avatar" />
				</div>
			</div>
		</div>

		<nav v-if="open" class="main-header__nav-mobile main-mobile-header-closed" role="menubar">
			<RouterLink to="/" class="main-header__navlink-mobile" :title="$t('Home')" role="menuitem">{{
				$t('Home')
			}}</RouterLink>
			<RouterLink
				to="/services"
				class="main-header__navlink-mobile"
				:title="$t('Services')"
				role="menuitem"
				>{{ $t('Services') }}</RouterLink
			>
			<RouterLink
				to="/about"
				class="main-header__navlink-mobile"
				:title="$t('About')"
				role="menuitem"
				>{{ $t('About') }}</RouterLink
			>
			<RouterLink
				to="/support"
				class="main-header__navlink-mobile"
				:title="$t('Support')"
				role="menuitem"
				>{{ $t('Support') }}</RouterLink
			>
		</nav>
	</div>
</template>

<style>
#open-mobile-menu {
	cursor: pointer;
	font-size: 25px;
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
	border-top: 1px solid var(--divider-primary);
	transition: all 0.5s;
	padding-top: 20px;
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
