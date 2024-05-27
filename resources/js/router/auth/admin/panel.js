// Admin routes (guard admin)
const routes = [
	// Redirect to admin panel
	{
		path: '/admin/panel',
		name: 'admin.panel',
		redirect: { name: 'admin.dashboard' },
		meta: { requiresAdmin: true, adminRoute: true },
	},
	{
		path: '/admin/dashboard',
		name: 'admin.dashboard',
		component: () => import('@/views/panel/admin/DashboardView.vue'),
		meta: { requiresAdmin: true, adminRoute: true },
	},
	{
		path: '/admin/orders',
		name: 'admin.orders',
		component: () => import('@/views/panel/admin/OrdersView.vue'),
		meta: { requiresAdmin: true, adminRoute: true },
	},
]

export default routes
