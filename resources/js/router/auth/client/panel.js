// Client routes (guard web)
const routes = [
	{
		path: '/panel',
		name: 'panel',
		redirect: { name: 'panel.pulpit' },
	},
	{
		path: '/client/panel',
		name: 'client.panel',
		redirect: { name: 'panel.pulpit' },
	},
	{
		path: '/panel/pulpit',
		name: 'panel.pulpit',
		component: () => import('@/views/panel/client/DashboardView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/panel/profil',
		name: 'panel.profil',
		component: () => import('@/views/panel/client/PanelProfilAvatarView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/panel/profil/details',
		name: 'panel.profil.details',
		component: () => import('@/views/panel/client/PanelProfilDetailsView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/panel/profil/images',
		name: 'panel.profil.images',
		component: () => import('@/views/panel/client/PanelProfilImagesView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/panel/profil/social',
		name: 'panel.profil.social',
		component: () => import('@/views/panel/client/PanelProfilSocialView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/panel/settings',
		name: 'panel.settings',
		component: () => import('@/views/panel/client/SettingsAccountView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/panel/settings/address',
		name: 'panel.settings.address',
		component: () => import('@/views/panel/client/SettingsAddressView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/panel/settings/password',
		name: 'panel.settings.password',
		component: () => import('@/views/panel/client/SettingsPasswordView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/panel/settings/account-delete',
		name: 'panel.settings.account-delete',
		component: () => import('@/views/panel/client/SettingsAccountDeleteView.vue'),
		meta: { requiresAuth: true },
	},
	// {
	// 	path: '/panel/notifications',
	// 	name: 'panel.notifications',
	// 	component: () => import('@/views/panel/client/OrdersView.vue'),
	// 	meta: { requiresAuth: true },
	// },
	// {
	// 	path: '/panel/orders',
	// 	name: 'panel.orders',
	// 	component: () => import('@/views/panel/client/OrdersView.vue'),
	// 	meta: { requiresAuth: true },
	// },
	// {
	// 	path: '/panel/orders/:id',
	// 	name: 'panel.orders.details',
	// 	component: () => import('@/views/panel/client/SingleOrderView.vue'),
	// 	meta: { requiresAuth: true },
	// },
	// {
	// 	path: '/panel/messages',
	// 	name: 'panel.messages',
	// 	component: () => import('@/views/panel/client/OrdersView.vue'),
	// 	meta: { requiresAuth: true },
	// },
]

export default routes
