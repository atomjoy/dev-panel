<script setup>
import PageLink from './PageLink.vue'
</script>

<template>
	<PageLink url="/panel/profil" :title="$t('Avatar')" :description="$t('Add your avatar.')">
		<i class="fa-regular fa-circle-user"></i>
	</PageLink>
	<PageLink url="/panel/profil/details" :title="$t('Details')" :description="$t('Add your details.')">
		<i class="fa-solid fa-circle-info"></i>
	</PageLink>
	<PageLink url="/panel/profil/images" :title="$t('Images')" :description="$t('Add your images.')">
		<i class="fa-regular fa-image"></i>
	</PageLink>
	<PageLink url="/panel/profil/social" :title="$t('Social')" :description="$t('Add your social links.')">
		<i class="fa-regular fa-thumbs-up"></i>
	</PageLink>
</template>
