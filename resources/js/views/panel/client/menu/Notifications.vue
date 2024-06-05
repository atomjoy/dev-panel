<script setup>
import NotifyPanel from '@/components/notify/NotifyPanel/NotifyPanel.vue'
import NotifyButton from '@/components/notify/Buttons/NotifyButton.vue'
import { useNotifyStore } from '@/components/notify/NotifyPanel/stores/notify-panel.js'

const notify = useNotifyStore()
</script>
<template>
	<NotifyPanel />
	<NotifyButton :active="notify.unread > 0" @click="notify.toggleOpen" />
</template>
