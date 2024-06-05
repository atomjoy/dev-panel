<script setup>
import PageLinkMobile from './PageLinkMobile.vue'
</script>

<template>
	<PageLinkMobile url="/panel/profil" :title="$t('Avatar')" :description="$t('Add or update your avatar.')">
		<i class="fa-regular fa-circle-user"></i>
	</PageLinkMobile>
	<PageLinkMobile url="/panel/profil/details" :title="$t('Details')" :description="$t('Add or update your details.')">
		<i class="fa-solid fa-circle-info"></i>
	</PageLinkMobile>
	<PageLinkMobile url="/panel/profil/images" :title="$t('Images')" :description="$t('Add or update your images.')">
		<i class="fa-regular fa-image"></i>
	</PageLinkMobile>
	<PageLinkMobile url="/panel/profil/social" :title="$t('Social links')" :description="$t('Add or update your social links.')">
		<i class="fa-regular fa-thumbs-up"></i>
	</PageLinkMobile>
</template>
