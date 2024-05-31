<script setup>
import axios from 'axios'
import Input from '@/components/input/Input.vue'
import avatar_default from './profil/avatar.png'
import { toRefs, ref } from 'vue'

const props = defineProps({
	avatar: { default: avatar_default },
	label: { default: 'Select image' },
	remove_avatar_url: { default: '/web/api/remove/avatar' },
	remove_success: { default: 'Avatar removed.' },
	remove_error: { default: 'Avatar not removed.' },
})

const avatar_path = ref(null)

if (props.avatar) {
	avatar_path.value = '/storage/' + props.avatar

	if (props.avatar.toLowerCase().startsWith('http://')) {
		avatar_path.value = props.avatar
	}

	if (props.avatar.toLowerCase().startsWith('https://')) {
		avatar_path.value = props.avatar
	}
} else {
	avatar_path.value = avatar_default
}

function getImagePath(e) {
	const path = URL.createObjectURL(e.target.files[0])
	if (path) {
		avatar_path.value = path
	}

	const el = document.querySelector('#refresh-user-image')
	if (el) {
		el.src = path
	}
}

async function removeAvatar() {
	try {
		await axios.post(props.remove_avatar_url, [])
		avatar_path.value = avatar_default
		alert(props.remove_success)
	} catch (err) {
		alert(props.remove_error)
	}
}

function openFile() {
	let el = document.querySelector('#avatar-input')
	el.click()
}
</script>

<template>
	<div class="input-group">
		<div class="avatar-input">
			<div @click="removeAvatar" class="delete-avatar" :title="$t('Remove avatar')">
				<i class="fa-solid fa-trash"></i>
			</div>
			<img :src="avatar_path" class="avatar-image" />
			<div id="choose-file" @click="openFile">
				<span class="choose-info">{{ $t('Select image with .webp, .png or .jpg extension.') }}</span>
				<span id="upload-button">{{ $t('Choose Image') }}</span>
			</div>
			<input id="avatar-input" @change="getImagePath" type="file" name="avatar" hidden="true" />

			<!-- <Input @change="getImagePath" :label="props.label" name="avatar" type="file" id="avatar-input" /> -->
		</div>
	</div>
</template>

<style scoped>
#choose-file {
	flex-grow: 1;
	float: left;
	width: 100%;
	padding: 20px;
	margin: 20px 0px 0px 0px;
	text-align: center;
	border-radius: var(--border-radius);
	color: var(--text-primary);
	border: 2px dashed var(--divider-primary);
}
.choose-info {
	float: left;
	width: 100%;
	padding: 10px;
	color: var(--text-secondary);
}
#upload-button {
	display: inline-block;
	margin-top: 30px;
	padding: 10px 40px;
	background: transparent;
	font-weight: 500;
	color: var(--text-secondary);
	background: var(--bg-secondary);
	border-radius: var(--wow-border-radius);
	cursor: pointer;
}
.avatar-input {
	position: relative;
	display: flex;
	display: block;
	float: left;
	width: 100%;
}
.delete-avatar {
	position: absolute;
	top: 55px;
	left: 55px;
	width: 42px;
	height: 42px;
	padding: 3px;
	text-align: center;
	border-radius: 50%;
	cursor: pointer;
	color: #fff;
	border: 5px solid var(--wow-bg);
	background: var(--wow-accent);
	transition: all 0.6s;
}
.delete-avatar:hover {
	background: #f23;
}
.avatar-image {
	float: left;
	min-width: 80px;
	max-width: 80px;
	min-height: 80px;
	max-height: 80px;
	padding: 3px;
	margin-right: 30px;
	margin-top: 10px;
	border-radius: 50%;
	object-fit: cover;
	border: 2px solid var(--wow-accent);
}
</style>

<!-- Avatars https://i.pravatar.cc/128 -->
