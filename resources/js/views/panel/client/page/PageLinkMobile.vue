<script setup>
const props = defineProps(['url', 'title', 'description'])
</script>
<template>
	<router-link :to="props.url" class="page__link-mobile" activeClass="page__link-mobile-active">
		<slot></slot> <span>{{ $t(props.title) }}</span>
	</router-link>
</template>
<style>
.page__link-mobile {
	font-size: 15px;
	box-sizing: border-box;
	float: left;
	width: calc(25% - 20px);
	padding: 10px 10px 10px 15px;
	margin: 0px 10px 10px 10px;
	display: flex;
	align-items: center;
	border-radius: 50px;
	color: var(--text-secondary);
	background: var(--bg-primary);
	border: 1px solid var(--bg-primary);
	min-width: fit-content;
}
.page__link-mobile i {
	float: left;
	margin: 0px 20px 0px 0px;
}
.page__link-mobile:hover {
	color: var(--accent-primary) !important;
}
.page__link-mobile:hover * {
	color: var(--accent-primary);
	transition: all 0.6s;
}
.page__link-mobile-active * {
	font-weight: 700;
	color: var(--text-primary) !important;
}
.page__link-mobile-active:hover * {
	color: var(--accent-primary) !important;
}

@media all and (max-width: 640px) {
	.page__link-mobile {
		width: calc(50% - 20px);
	}
}
</style>
