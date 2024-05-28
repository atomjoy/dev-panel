<script setup>
import { RouterLink } from 'vue-router'
import { useAuthStore } from '@/stores/auth.js'
import ChangeLocale from '@/components/utils/ChangeLocale/ChangeLocale.vue'
import ChangeTheme from '@/components/utils/ChangeTheme/ChangeTheme.vue'
import ProfilMenu from '@/components/notify/ProfilMenu/ProfilMenu.vue'
import SubmenuPopover from './submenu/SubmenuPopover.vue'
import top from '@/json/menu/TopMenu.js'

const auth = useAuthStore()
const logged = auth.isLoggedIn.value
const user = auth.getUser
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
					<SubmenuPopover url="/" title="Home" :items="top.homeItems" />
					<SubmenuPopover url="/services" title="Services" :items="top.servicesItems" />
					<SubmenuPopover url="/about" title="About" :items="top.aboutItems" />
					<SubmenuPopover url="/support" title="Support" :items="top.supportItems" />
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
	color: var(--accent-primary);
}

.main-header__navlink--active {
	font-weight: 600;
	color: var(--accent-primary);
}

.main-header__navlink--active:hover {
	color: var(--accent-primary);
}

.main-header__navlink--small {
	color: var(--text-primary);
	background: var(--bg-secondary);
	border-radius: var(--btn-border-radius);
	font-weight: 500;
	font-size: 14px;
	margin: 5px;
}

.main-header__sublink {
	color: var(--text-primary);
	font-size: 14px;
	font-weight: 500;
}

.main-header__subtitle {
	color: var(--text-secondary);
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
	box-shadow: 0px 5px 10px #0001;
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
	.section__wrapper,
	.main-header__container {
		max-width: 1360px;
	}
}
</style>
