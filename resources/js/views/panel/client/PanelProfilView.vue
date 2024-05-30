<script setup>
import ClientMenu from './menu/ClientMenu.vue'
import PageLink from './page/PageLink.vue'
</script>
<template>
	<ClientMenu>
		<div class="page">
			<div class="page__menu">{{ $t('Profil') }} <i class="fas fa-chevron-down"></i></div>
			<div class="page__wrapper">
				<div class="page__menu-left">
					<div class="page-menu__title">{{ $t('Profil') }}</div>
					<PageLink url="/panel/profil" title="Avatar" description="Add or update your avatar." icon="fa-regular fa-user" />
					<PageLink url="/panel/profil/avatar" title="Avatar" description="Add or update your avatar." icon="fa-regular fa-user" />
					<PageLink url="/panel/profil/avatar" title="Avatar" description="Add or update your avatar." icon="fa-regular fa-user" />
					<PageLink url="/panel/profil/avatar" title="Avatar" description="Add or update your avatar." icon="fa-regular fa-user" />
					<PageLink url="/panel/profil/avatar" title="Avatar" description="Add or update your avatar." icon="fa-regular fa-user" />
				</div>
				<div class="page__content">
					<div class="page-content__title">{{ $t('Avatar Settings') }}</div>
				</div>
			</div>
		</div>
	</ClientMenu>
</template>

<style>
.page__menu {
	display: none;
	float: left;
	width: 100%;
	padding: 20px;
	border-bottom: 1px solid var(--divider-primary);
}
.page__menu i {
	float: right;
}
.page__wrapper {
	float: left;
	width: 100%;
	display: flex;
	align-items: stretch;
}
.page__menu-left {
	float: left;
	width: 35%;
	padding: 20px 0px 20px 30px;
}
.page__content {
	float: left;
	width: 65%;
	padding: 20px 25px;
	border-left: 1px solid var(--divider-primary);
}
.page-menu__title {
	font-size: 21px;
	font-weight: 700;
	margin-bottom: 20px;
}
.page-content__title {
	font-size: 23px;
	font-weight: 700;
}
</style>
