<script setup>
import PageLink from './PageLink.vue'
</script>

<template>
	<PageLink url="/panel/settings" :title="$t('Account')" :description="$t('Update your account details.')">
		<i class="fa-solid fa-user"></i>
	</PageLink>
	<PageLink url="/panel/settings/address" :title="$t('Address')" :description="$t('Update your address.')">
		<i class="fa-solid fa-address-card"></i>
	</PageLink>
	<PageLink url="/panel/settings/password" :title="$t('Password')" :description="$t('Update your password.')">
		<i class="fa-solid fa-key"></i>
	</PageLink>
	<PageLink url="/panel/settings/account-delete" :title="$t('Delete Account')" :description="$t('Remove your account here.')">
		<i class="fa-solid fa-user-secret"></i>
	</PageLink>
</template>
