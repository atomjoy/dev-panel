<script setup>
import { onMounted, defineProps, toRefs, ref } from 'vue'
import { useRouter } from 'vue-router'
import { RouterLink } from 'vue-router'
import { useI18n } from 'vue-i18n'
import ExitIcon from './icons/ExitIcon.vue'
import ChevronIcon from './icons/ChevronIcon.vue'
import ProfilIcon from './icons/ProfilIcon.vue'
import AccountIcon from './icons/AccountIcon.vue'
import avatar_default from '@/components/input/profil/avatar.png'

const props = defineProps({
	avatar: { type: String, default: avatar_default }, // https://i.pravatar.cc/128
	name: { type: String, default: '' },
	email: { type: String, default: '' },
	logged: { type: Boolean, default: false },
	open: { type: Boolean, default: false },
	profil: { type: Boolean, default: false },
})
const { t, locale } = useI18n({ useScope: 'global' })
const router = useRouter()
const { open } = toRefs(props)
const avatar_path = ref(null)

if (props.avatar) {
	let reg = new RegExp('^(http|https)://', 'i')

	if (reg.test(props.avatar)) {
		avatar_path.value = props.avatar
	} else {
		avatar_path.value = '/storage/' + props.avatar
	}
} else {
	avatar_path.value = avatar_default
}

function defImage(e) {
	e.onerror = null
	e.target.src = avatar_default
}

onMounted(() => {})
</script>
<template>
	<div class="user-login-btn">
		<RouterLink v-if="!props.logged" to="/login" role="menuitem" rel="nofollow" class="main-header__navlink main-header__navlink--small" :title="$t('Sign in')">
			{{ $t('Sign in') }}
		</RouterLink>

		<div class="logged-user" v-if="props.logged" @click="open = !open">
			<div class="user-profil">
				<!-- <div class="user-info user-info-mobile" v-if="profil">
					<div class="name">
						<strong>{{ props.name }}</strong>
					</div>
					<div class="title">
						<small>{{ props.email }}</small>
					</div>
				</div> -->

				<div class="user-image">
					<img :src="avatar_path" @error="defImage" id="refresh-user-image" />
					<div :class="{ 'open-icon': true, 'close-icon': open }"><ChevronIcon /></div>
				</div>
			</div>

			<div class="user-menu" v-if="open">
				<div class="name">
					<strong>{{ props.name ?? 'Unknown' }}</strong>
				</div>
				<router-link to="/panel/profil" class="link-mini" activeClass="disable-active-class" exactActiveClass="disable-active-class">
					<ProfilIcon />
					{{ t('Profile') }}
				</router-link>

				<router-link to="/panel/account" class="link-mini" activeClass="disable-active-class" exactActiveClass="disable-active-class">
					<AccountIcon />
					{{ t('Account') }}
				</router-link>

				<div class="footer">
					<router-link to="/logout" class="link-mini">
						<ExitIcon />
						{{ t('Logout') }}
					</router-link>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped>
.user-login-btn {
	float: right;
}

.logged-user {
	display: inline-block;
	position: relative;
	margin-left: 10px;
}

.user-profil {
	float: right;
	display: flex;
	align-items: center;
}

.user-info {
	text-align: left;
	margin-right: 10px;
}

.user-menu {
	position: absolute;
	width: auto;
	height: auto;
	min-width: 250px;
	top: 65px;
	right: 0px;
	padding: 10px;
	background: var(--bg-primary);
	border-radius: var(--border-radius);
	border: 1px solid var(--divider-primary);
	box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
	z-index: 2;
}
.user-menu .name {
	margin-bottom: 15px;
	padding: 5px 15px 10px 15px;
	border-bottom: 1px solid var(--divider-primary);
}

.user-menu .footer {
	float: left;
	width: 100%;
	margin-top: 5px;
	padding-top: 5px;
	border-top: 1px solid var(--divider-primary);
}
.user-menu a.link-mini {
	display: flex;
	float: left;
	width: 100%;
	padding: 10px;
	text-align: left;
	color: var(--text-primary);
	border-radius: var(--border-radius);
}

.user-menu a.link-mini svg {
	margin-right: 10px;
	fill: var(--accent-primary);
	/* stroke: var(--accent-primary); */
}

.user-menu a.link-mini:hover {
	background: var(--btn-gray);
}

.user-image {
	position: relative;
	box-sizing: border-box;
	float: right;
	width: 53px;
	height: 53px;
	padding: 4px;
	cursor: pointer;
	border-radius: 50%;
	background: var(--bg-secondary);
	border: 1px solid var(--bg-secondary);
}
.user-image img {
	display: inline;
	float: right;
	width: 44px;
	height: 44px;
	border-radius: 50%;
}
.open-icon {
	position: absolute;
	bottom: -11px;
	right: -11px;
	padding: 2px;
	width: 30px;
	height: 30px;
	border: 5px solid var(--bg-primary);
	background: var(--text-primary);
	overflow: hidden;
	border-radius: 50%;
	transition: all 0.6s;
	z-index: 1;
}
.open-icon svg {
	width: 17px;
	height: 17px;
	stroke: var(--bg-primary);
	border-radius: 50%;
}
.user-image:hover .open-icon {
	background: var(--accent-primary);
}

.close-icon {
	transform: rotate(180deg) !important;
}

@media (max-width: 640px) {
	.user-info-mobile {
		display: none !important;
	}
}
</style>
