<script setup>
const props = defineProps(['url', 'title', 'description'])
</script>
<template>
	<router-link :to="props.url" class="page__link" activeClass="page__link-active">
		<slot></slot>
		<div class="page-link__text">
			<div class="page-link__title">{{ $t(props.title) }} <i class="fas fa-chevron-right"></i></div>
			<div class="page-link__description">{{ $t(props.description) }}</div>
		</div>
	</router-link>
</template>
<style>
.page__link {
	float: left;
	width: 100%;
	display: flex;
	align-items: start;
	padding: 20px 0px 0px 0px;
}
.page__link > i {
	float: left;
	margin: 0px 20px 5px 0px;
	color: var(--text-secondary);
	background: var(--bg-secondary);
	border-radius: var(--border-radius);
	min-width: 42px;
	min-height: 42px;
	line-height: 42px;
	text-align: center;
}
.page__link:hover {
	color: var(--accent-primary) !important;
}
.page__link:hover * {
	color: var(--accent-primary);
	transition: all 0.6s;
}
.page__link-active * {
	color: var(--text-primary) !important;
}
.page__link-active:hover * {
	color: var(--accent-primary) !important;
}
.page-link__title {
	font-size: 16px;
	font-weight: 500;
	padding: 10px 20px 10px 0px;
	color: var(--text-secondary);
}
.page-link__title i {
	float: right;
	margin: 0px;
	line-height: normal;
	padding: 5px 0px;
	background: transparent;
}
.page-link__description {
	font-size: 15px;
	font-weight: 400;
	padding: 0px 20px 20px 0px;
	color: var(--text-third);
	border-bottom: 1px solid var(--divider-primary);
}
.page-link__text {
	width: 100%;
	flex-grow: 1;
}
.page__link:last-child .page-link__description {
	border-bottom: none;
}
.page__link-active .page-link__title {
	font-weight: 700;
}
</style>
