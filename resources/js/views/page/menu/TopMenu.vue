<script setup>
import { RouterLink } from 'vue-router'
import ChangeLocale from '@/components/utils/ChangeLocale/ChangeLocale.vue'
import ChangeTheme from '@/components/utils/ChangeTheme/ChangeTheme.vue'
import ProfilMenu from '@/components/notify/ProfilMenu/ProfilMenu.vue'
import { useAuthStore } from '@/stores/auth.js'
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
					<RouterLink to="/" class="main-header__navlink" :title="$t('Home')" role="menuitem">{{
						$t('Home')
					}}</RouterLink>
					<RouterLink
						to="/services"
						class="main-header__navlink"
						:title="$t('Services')"
						role="menuitem"
						>{{ $t('Services') }}</RouterLink
					>
					<RouterLink
						to="/about"
						class="main-header__navlink"
						:title="$t('About')"
						role="menuitem"
						>{{ $t('About') }}</RouterLink
					>
					<RouterLink
						to="/support"
						class="main-header__navlink"
						:title="$t('Support')"
						role="menuitem"
						>{{ $t('Support') }}</RouterLink
					>
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

@media all and (min-width: 1460px) {
	.section__wrapper,
	.main-header__container {
		max-width: 1360px;
	}
}
</style>
