<script setup>
import axios from 'axios'
import Label from '@/components/input/Label.vue'
import profile_default from './profil/banner.png'
import { toRefs, ref } from 'vue'

const props = defineProps({
	profile: { default: profile_default },
	label: { default: 'Select image' },
	remove_profile_url: { default: '/web/api/remove/banner' },
	remove_success: { default: 'Profil banner removed.' },
	remove_error: { default: 'Profil banner not removed.' },
})

const profile_path = ref(null)

if (props.profile) {
	profile_path.value = '/storage/' + props.profile

	console.log(profile_path.value, props.profile)

	if (props.profile.toLowerCase().startsWith('http://')) {
		profile_path.value = props.profile
	}

	if (props.profile.toLowerCase().startsWith('https://')) {
		profile_path.value = props.profile
	}
} else {
	profile_path.value = profile_default
}

function getImagePath(e) {
	const path = URL.createObjectURL(e.target.files[0])
	if (path) {
		profile_path.value = path
	}
}

async function removeImage() {
	try {
		await axios.post(props.remove_profile_url, [])
		profile_path.value = profile_default
		alert(props.remove_success)
	} catch (err) {
		alert(props.remove_error)
	}
}

function openFile() {
	let el = document.querySelector('#profile-input')
	el.click()
}
</script>

<template>
	<div class="input-group">
		<div class="profile-input">
			<div @click="removeImage" class="delete-profile" :title="$t('Remove profile image')">
				<i class="fa-solid fa-trash"></i>
			</div>
			<img :src="profile_path" class="profile-image" />

			<Label name="profile" text="Select image" />

			<div id="choose-file" @click="openFile">
				<span class="choose-info">{{ $t('Select image with .webp, .png or .jpg extension (min. 1920x540 px).') }}</span>
				<span id="upload-button"><i class="fa-solid fa-upload"></i> {{ $t('Choose Image') }}</span>
			</div>
			<input id="profile-input" @change="getImagePath" type="file" name="banner" hidden="true" />
		</div>
	</div>
</template>

<style scoped>
#choose-file {
	flex-grow: 1;
	float: left;
	width: 100%;
	padding: 20px;
	margin: 0px;
	text-align: center;
	border-radius: var(--border-radius);
	color: var(--text-primary);
	border: 2px dashed var(--divider-primary);
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
.choose-info {
	float: left;
	width: 100%;
	padding: 10px;
	color: var(--text-secondary);
}
.profile-input {
	position: relative;
	display: flex;
	display: block;
	float: left;
	width: 100%;
}
.delete-profile {
	position: absolute;
	top: 0px;
	left: -5px;
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
.delete-profile:hover {
	background: #f23;
}
.profile-image {
	float: left;
	width: 100%;
	height: auto;
	max-height: 256px;
	padding: 5px;
	margin-right: 30px;
	margin-top: 10px;
	border-radius: var(--border-radius);
	background: var(--bg-secondary);
	object-fit: cover;
	object-position: top center;
}
</style>

<!-- Avatars https://i.prprofile.cc/128 -->
