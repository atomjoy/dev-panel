<script setup>
import ClientMenu from './menu/ClientMenu.vue'
import PageLinkMobile from './page/PageLinkMobile.vue'
import PageLink from './page/PageLink.vue'
import ErrorMessage from './page/ErrorMessage.vue'
import Button from '@/components/input/Button.vue'
import AvatarInput from '@/components/input/AvatarInput.vue'
import { useAuthStore } from '@/stores/auth.js'
import { onBeforeMount, computed, ref } from 'vue'
const auth = useAuthStore()
const user = auth.getUser

let userAvatar = computed({
	get() {
		return user.value?.profile?.avatar ?? ''
	},
	set(val) {
		avatar.value = val
	},
})

function onSubmitAvatar(e) {
	auth.changeUserAvatar(new FormData(e.target))
	auth.scrollTop()
}
</script>
<template>
	<ClientMenu>
		<div class="page">
			<div class="page__menu">
				<span>{{ $t('Profil') }}</span>
				<!-- <i class="fas fa-chevron-down"></i> -->
				<div class="page-menu__nav">
					<PageLinkMobile url="/panel/profil" title="Avatar" description="Add or update your avatar.">
						<i class="fa-regular fa-user"></i>
					</PageLinkMobile>
					<PageLinkMobile url="/panel/profil/details" title="Details" description="Add or update your details.">
						<i class="fa-solid fa-circle-info"></i>
					</PageLinkMobile>
					<PageLinkMobile url="/panel/profil/images" title="Images" description="Add or update your images.">
						<i class="fa-regular fa-image"></i>
					</PageLinkMobile>
					<PageLinkMobile url="/panel/profil/social" title="Social links" description="Add or update your social links.">
						<i class="fa-regular fa-thumbs-up"></i>
					</PageLinkMobile>
				</div>
			</div>
			<div class="page__wrapper">
				<div class="page__menu-left">
					<div class="page-menu__title">{{ $t('Profil') }}</div>
					<PageLink url="/panel/profil" title="Avatar" description="Add or update your avatar.">
						<i class="fa-regular fa-user"></i>
					</PageLink>
					<PageLink url="/panel/profil/details" title="Details" description="Add or update your details.">
						<i class="fa-solid fa-circle-info"></i>
					</PageLink>
					<PageLink url="/panel/profil/images" title="Images" description="Add or update your images.">
						<i class="fa-regular fa-image"></i>
					</PageLink>
					<PageLink url="/panel/profil/social" title="Social links" description="Add or update your social links.">
						<i class="fa-regular fa-thumbs-up"></i>
					</PageLink>
				</div>
				<div class="page__content">
					<div class="page-content__title">
						<i class="fa-regular fa-user"></i>
						<span class="submenu__title">{{ $t('Avatar settings') }}</span>
					</div>
					<p>{{ $t('Upload your avatar image here.') }}</p>

					<ErrorMessage />

					<h4 class="h4-title">Upload avatar</h4>
					<form @submit.prevent="onSubmitAvatar" method="post" enctype="multipart/form-data" class="label-color">
						<TitleH2 :title="$t('Avatar')" />
						<AvatarInput :label="$t('Select image')" :avatar="userAvatar" />
						<Button :text="$t('Update')" />
					</form>
				</div>
			</div>
		</div>
	</ClientMenu>
</template>

<style>
.h4-title {
	margin-top: 50px;
}
.page__menu {
	display: none;
	float: left;
	width: 100%;
	padding: 20px;
	border-bottom: 1px solid var(--divider-primary);
}
.page__menu > span {
	font-size: 21px;
	font-weight: 700;
}
.page__menu > i {
	float: right;
}
.page-menu__nav {
	float: left;
	width: 100%;
	height: auto;
	margin-top: 20px;
	padding: 10px 0px 0px 0px;
	background: var(--bg-secondary);
	border-radius: 25px;
	/* border: 1px solid var(--divider-primary); */
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: flex-start;
}
.page__wrapper {
	float: left;
	width: 100%;
	min-height: 600px;
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
	padding: 20px 30px;
	border-left: 1px solid var(--divider-primary);
}
.page-menu__title {
	font-size: 21px;
	font-weight: 700;
	padding: 10px 0px 30px 0px;
}
.page-content__title {
	font-size: 18px;
	font-weight: 700;
	padding: 10px 0px 30px 0px;
	border-bottom: 1px solid var(--divider-primary);
	display: flex;
	align-items: center;
}

.page-content__title i {
	margin-right: 20px;
}

@media all and (max-width: 1024px) {
	.page__menu {
		display: inherit;
	}
	.page__menu-left {
		display: none;
	}
	.page__content {
		width: 100%;
		border: 0px;
	}
}
</style>
