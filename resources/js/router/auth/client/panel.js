// Client routes (guard web)
const routes = [
	{
		path: '/panel',
		name: 'panel',
		redirect: { name: 'panel.profil' },
	},
	{
		path: '/client/panel',
		name: 'client.panel',
		redirect: { name: 'panel.profil' },
	},
	{
		path: '/panel/profil',
		name: 'panel.profil',
		component: () => import('@/views/panel/client/PanelProfilView.vue'),
		meta: { requiresAuth: true },
	},
	// {
	// 	path: '/panel/address',
	// 	name: 'panel.address',
	// 	component: () => import('@/views/panel/client/AddressView.vue'),
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
	// {
	// 	path: '/panel/account',
	// 	name: 'panel.account',
	// 	component: () => import('@/views/panel/client/AccountView.vue'),
	// 	meta: { requiresAuth: true },
	// },
	// {
	// 	path: '/panel/account/delete',
	// 	name: 'panel.account.delete',
	// 	component: () => import('@/views/panel/client/AccountDeleteView.vue'),
	// 	meta: { requiresAuth: true },
	// },
	// // Logged only
	// {
	// 	path: '/panel/password',
	// 	name: 'panel.password',
	// 	component: () => import('@/views/panel/client/PasswordView.vue'),
	// 	meta: { requiresAuth: true },
	// },
	// {
	// 	path: '/panel/notifications',
	// 	name: 'panel.notifications',
	// 	component: () => import('@/views/panel/client/OrdersView.vue'),
	// 	meta: { requiresAuth: true },
	// },
]

export default routes
