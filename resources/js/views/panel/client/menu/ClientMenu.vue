<script setup>
import { RouterLink } from 'vue-router'
import { useAuthStore } from '@/stores/auth.js'
import ChangeLocale from '@/components/utils/ChangeLocale/ChangeLocale.vue'
import ChangeTheme from '@/components/utils/ChangeTheme/ChangeTheme.vue'
import ProfilMenu from '@/components/notify/ProfilMenu/ProfilMenu.vue'
import menu from '@/json/menu/TopMenu.js'
import { ref } from 'vue'
import PageFooter from '../page/PageFooter.vue'

const auth = useAuthStore()
const logged = auth.isLoggedIn.value
const user = auth.getUser
const links = menu.links
let opened = ref(false)

function openMenu() {
	opened.value = !opened.value
}
</script>

<template>
	<div class="client-header">
		<div class="client-header__container">
			<div class="client-header__logo">
				<a href="/" class="client-header__logo-link" aria-label="homepage">
					<img class="client-header__logo-image" alt="Logo" src="/logo/logo-light.png" />
				</a>
			</div>
			<div class="client-header__nav-container">
				<nav class="client-header__nav" role="menubar">
					<!-- Links -->
				</nav>
				<div class="client-header__nav-right" role="presentation">
					<ChangeTheme />
					<ChangeLocale />
					<ProfilMenu :logged="logged" :profil="true" :name="user?.profile?.name" :email="user?.email" :avatar="user?.profile?.avatar" />
				</div>
			</div>
		</div>
		<div class="client-header__navbar">
			<div class="client-header__navbar-wrapper">
				<div class="client-header__title" @click="openMenu"><i class="fa-regular fa-user"></i> {{ $t('Profile') }}</div>
				<div :class="{ 'client-header__menu-btn': true, 'client-header__menu-btn-open': opened }" @click="openMenu"><i class="fas fa-chevron-down"></i></div>

				<div class="client-header__menu animate__animated animate__flipInX" v-if="opened">
					<RouterLink to="/panel/profil" class="client__link"><i class="fa-regular fa-user"></i> {{ $t('Profile') }}</RouterLink>
					<RouterLink to="/panel/settings" class="client__link"><i class="fa-solid fa-gear"></i> {{ $t('Settings') }}</RouterLink>
					<RouterLink to="/panel/messages" class="client__link"><i class="fa-regular fa-message"></i> {{ $t('Messages') }}</RouterLink>
					<RouterLink to="/panel/payments" class="client__link"><i class="fa-regular fa-credit-card"></i> {{ $t('Payments') }}</RouterLink>
					<RouterLink to="/panel/orders" class="client__link"><i class="fa-solid fa-box"></i> {{ $t('Orders') }}</RouterLink>
					<!-- <RouterLink v-for="index in 3" :key="index" to="/panel/account" class="client__link">{{ $t('Account') }}</RouterLink> -->
				</div>
			</div>
		</div>
	</div>
	<div class="panel__slot">
		<div class="panel__slot-wrapper">
			<slot></slot>
		</div>
	</div>
	<div class="panel__footer">
		<div class="panel__footer-wrapper">
			<PageFooter />
		</div>
	</div>
</template>

<style>
.client-header__navbar {
	position: relative;
	float: left;
	width: 100%;
	height: auto;
	padding: 0px;
	color: var(--text-primary);
	background: var(--bg-primary);
	transition: all 0.6s;
}

.panel__slot {
	float: left;
	width: 100%;
	height: auto;
	min-height: 100vh;
	padding: 30px 0px;
	background: var(--bg-secondary);
}

.panel__slot-wrapper {
	width: 90%;
	height: auto;
	max-width: 1020px;
	margin: 0px auto;
	padding: 0px;
	overflow: hidden;
	background: var(--bg-primary);
	border-radius: var(--border-radius);
}

.client-header__navbar-wrapper {
	width: 90%;
	max-width: 1120px;
	margin: 0px auto;
	transition: all 5s;
}

.client__link {
	font-size: 14px;
	padding: 10px 20px 10px 20px;
	border-radius: 50px;
	width: calc(25% - 10px) !important;
	margin: 5px;
	color: var(--text-primary) !important;
	border: 1px solid var(--divider-primary) !important;
	box-sizing: border-box;
	min-width: fit-content;
	transition: all 0.6s;
}

.client__link i {
	margin-right: 10px;
}

.main-header__navlink--active {
	font-weight: 900;
	color: var(--accent-primary) !important;
	border: 1px solid var(--accent-primary) !important;
}

.client__link:hover {
	color: var(--accent-primary) !important;
	/* border: 1px solid var(--accent-primary) !important; */
}

.client-header__title,
.client-header__menu-btn {
	float: left;
	margin: 10px 10px 10px 0px;
	padding: 8px 25px 8px 8px;
	font-size: 15px;
	border-radius: 50px;
	color: var(--bg-primary);
	background: var(--text-primary);
	cursor: pointer;
}

.client-header__title i,
.client-header__menu-btn i {
	color: var(--text-primary);
	background: var(--bg-primary);
	width: 30px;
	height: 30px;
	padding: 7px;
	margin-right: 20px;
	border-radius: 50px;
	text-align: center;
}

.client-header__menu-btn {
	padding: 8px;
	background: var(--bg-primary);
}
.client-header__menu-btn i {
	margin-right: 0px;
	transition: all 0.6s;
}
.client-header__menu-btn i:hover {
	margin-right: 0px;
	color: var(--bg-primary);
	background: var(--text-primary);
}

.client-header__menu-btn-open i {
	transform: rotate(180deg);
}

.client-header__menu {
	float: left;
	width: 100%;
	padding: 15px;
	margin: 10px 0px 20px 0px;
	background: var(--bg-primary);
	border: 1px solid var(--divider-primary);
	border-radius: 20px;
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: flex-start;
	transition: all 0.6s;
}

.client-header {
	float: left;
	width: 100%;
	padding: 5px 0px;
	box-sizing: border-box;
}
.client-header__container,
.panel__slot-wrapper {
	margin: 10px auto;
	width: 90%;
	max-width: 1120px;
	/* display: flex; */
}
.client-header__nav-container {
	display: flex;
	flex-grow: 1;
}
.client-header__nav {
	display: flex;
	flex-grow: 1;
	align-items: center;
	padding: 10px;
}
.client-header__nav-right {
	display: flex;
	align-items: center;
	padding: 10px;
}

.client-header__navlink {
	color: var(--text-primary);
	float: left;
	padding: 15px 25px;
	font-size: 15px;
	font-weight: 500;
	transition: all 0.4s;
}

.client-header__navlink:hover {
	color: var(--accent-primary);
}

.client-header__navlink--active {
	font-weight: 600;
	color: var(--accent-primary);
}

.client-header__navlink--active:hover {
	color: var(--accent-primary);
}

.client-header__navlink--small {
	color: var(--text-primary);
	background: var(--bg-secondary);
	border-radius: var(--btn-border-radius);
	font-weight: 500;
	font-size: 14px;
	margin: 5px;
}

.client-header__navlink--small:hover {
	color: var(--text-primary) !important;
}

.client-header__sublink {
	color: var(--text-primary);
	font-size: 14px;
	font-weight: 500;
}

.client-header__subtitle {
	color: var(--text-secondary);
	font-size: 14px;
	font-weight: 400;
	padding: 0px;
	margin: 0px;
}

.client-header__logo-link {
	float: left;
}

.client-header__logo-image {
	float: left;
	width: 80px;
	height: 80px;
	padding: 10px;
	content: var(--logo) !important;
}

.btn-border {
	border: 1px solid #dbdbde;
	border: 1px solid #e7e7e9;
}

.client-header__navlink--small {
	font-size: 14px;
	font-weight: 500;
	color: var(--text-primary);
}

.client-header__navlink--small:hover {
	color: var(--accent-primary);
}

.client-header__navlink--subtitle {
	color: var(--text-secondary);
	font-size: 13px;
	margin: 0px;
	padding: 0px 5px;
}

.popover__menu {
	position: relative;
	display: inline-block;
}

.popover__submenu {
	display: none;
	position: absolute;
	top: 50px;
	left: 0px;
	padding: 20px;
	width: auto;
	min-width: 250px;
	background: var(--bg-primary);
	border-radius: var(--border-radius);
	z-index: var(--z-index-menu);
	box-shadow: 0px 5px 10px #0003;
}

.popover__menu:hover .popover__submenu {
	display: inherit;
}

.rotate__chevron {
	padding: 5px;
	transition: all 0.6s;
}

.popover__menu:hover .rotate__chevron {
	transform: rotate(180deg);
}

.submenu__sublink {
	padding: 10px;
}

.submenu__sublink:hover {
	background: var(--bg-secondary);
}

@media all and (min-width: 1460px) {
	.client-header__container,
	.client-header__navbar-wrapper,
	.panel__slot-wrapper {
		max-width: 1360px;
		max-width: 1120px;
	}
}

@media all and (max-width: 1024px) {
	.client-header__navbar-wrapper .client__link {
		width: calc(33.333% - 10px) !important;
	}
}

@media all and (max-width: 640px) {
	.client-header__navbar-wrapper .client__link {
		width: calc(50% - 10px) !important;
	}
}
</style>
