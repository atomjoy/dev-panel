<script setup>
import { RouterLink } from 'vue-router'
import ChangeLocale from '@/components/utils/ChangeLocale/ChangeLocale.vue'
import ChangeTheme from '@/components/utils/ChangeTheme/ChangeTheme.vue'
</script>

<template>
	<div class="main-header">
		<div class="main-header__container">
			<div class="main-header__logo">
				<a href="/" class="main-header__logo-link" aria-label="homepage">
					<img class="main-header__logo-image the-useme-logo" alt="Page logo" src="/logo/logo-light.png" />
				</a>
			</div>
			<div class="main-header__nav-container">
				<nav class="main-header__nav" role="menubar">
					<RouterLink to="/" class="main-header__navlink" :title="$t('Home')" role="menuitem">{{ $t('Home') }}</RouterLink>
					<RouterLink to="/services" class="main-header__navlink" :title="$t('Services')" role="menuitem">{{ $t('Services') }}</RouterLink>
					<RouterLink to="/about" class="main-header__navlink" :title="$t('About')" role="menuitem">{{ $t('About') }}</RouterLink>
					<RouterLink to="/support" class="main-header__navlink" :title="$t('Support')" role="menuitem">{{ $t('Support') }}</RouterLink>
				</nav>
				<div class="main-header__nav-right" role="presentation">
					<a class="main-header__navlink main-header__navlink--small" href="/login" role="menuitem" rel="nofollow">{{ $t('Sign in') }}</a>
					<ChangeTheme />
					<ChangeLocale />
				</div>
			</div>
		</div>
	</div>
</template>
