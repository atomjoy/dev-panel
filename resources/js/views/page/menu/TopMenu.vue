<script setup>
import { RouterLink } from 'vue-router'
import { useAuthStore } from '@/stores/auth.js'
import ChangeLocale from '@/components/utils/ChangeLocale/ChangeLocale.vue'
import ChangeTheme from '@/components/utils/ChangeTheme/ChangeTheme.vue'
import ProfilMenu from '@/components/notify/ProfilMenu/ProfilMenu.vue'
import SubmenuPopover from './submenu/SubmenuPopover.vue'
const auth = useAuthStore()
const logged = auth.isLoggedIn.value
const user = auth.getUser

const homeItems = [
	{ url: '/service1', title: 'Service 1', subtitle: 'Service 1 description' },
	{ url: '/service2', title: 'Service 2', subtitle: 'Service 2 description' },
	{ url: '/service3', title: 'Service 3', subtitle: 'Service 3 description' },
	{ url: '/service4', title: 'Service 4', subtitle: 'Service 4 description' },
]
</script>

<template>
	<div class="main-header">
		<div class="main-header__container">
			<div class="main-header__logo">
				<a href="/" class="main-header__logo-link" aria-label="homepage">
					<img class="main-header__logo-image" alt="Logo" src="/logo/logo-light.png" />
				</a>
			</div>
			<div class="main-header__nav-container">
				<nav class="main-header__nav" role="menubar">
					<RouterLink to="/" class="main-header__navlink" :title="$t('Home')" role="menuitem">{{ $t('Home') }}</RouterLink>

					<SubmenuPopover url="/services" title="Services" :items="homeItems" />

					<RouterLink to="/about" class="main-header__navlink" :title="$t('About')" role="menuitem">{{ $t('About') }}</RouterLink>
					<RouterLink to="/support" class="main-header__navlink" :title="$t('Support')" role="menuitem">{{ $t('Support') }}</RouterLink>
				</nav>
				<div class="main-header__nav-right" role="presentation">
					<ChangeTheme />
					<ChangeLocale />
					<ProfilMenu :logged="logged" :profil="true" :name="user?.profile?.name" :email="user?.email" :avatar="user?.profile?.avatar" />
				</div>
			</div>
		</div>
	</div>
</template>

<style>
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
	box-shadow: 0px 5px 10px #0001;
}

.popover__menu:hover .popover__submenu {
	display: inherit;
}

.popover__menu:hover .main-header__navlink {
	color: #555;
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
	background: var(--btn-gray);
}

.main-header {
	float: left;
	width: 100%;
	padding: 5px 0px;
	box-sizing: border-box;
}
.main-header__container {
	margin: 10px auto;
	width: 90%;
	max-width: 1120px;
	display: flex;
}
.main-header__nav-container {
	display: flex;
	flex-grow: 1;
}
.main-header__nav {
	display: flex;
	flex-grow: 1;
	align-items: center;
	padding: 10px;
}
.main-header__nav-right {
	display: flex;
	align-items: center;
	padding: 10px;
}

.main-header__navlink {
	color: var(--text-primary);
	float: left;
	padding: 15px 25px;
	font-size: 15px;
	font-weight: 500;
	transition: all 0.4s;
}

.main-header__navlink:hover {
	color: #555;
}

.main-header__navlink--active {
	font-weight: 500;
	color: var(--accent-primary);
	/* border-bottom: 1px solid var(--accent-primary); */
}

.main-header__navlink--active:hover {
	color: var(--accent-primary);
}

.main-header__navlink--small {
	color: #0d0c22;
	background: #f9f9f9;
	font-size: 14px;
	font-weight: 500;
	border-radius: var(--btn-border-radius);
	margin: 5px;
}

.main-header__sublink {
	color: var(--text-primary);
	font-size: 14px;
	font-weight: 500;
}

.main-header__subtitle {
	color: var(--text-light-primary);
	font-size: 14px;
	font-weight: 400;
	padding: 0px;
	margin: 0px;
}

.main-header__logo-link {
	float: left;
}

.main-header__logo-image {
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

.main-header__navlink--small {
	font-size: 14px;
	font-weight: 500;
	color: var(--text-primary);
}

.main-header__navlink--small:hover {
	color: var(--accent-primary);
}

.main-header__navlink--subtitle {
	color: var(--text-light-primary);
	font-size: 13px;
	margin: 0px;
	padding: 0px 5px;
}

@media all and (min-width: 1460px) {
	.section__wrapper,
	.main-header__container {
		max-width: 1360px;
	}
}
</style>
