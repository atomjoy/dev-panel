import clientPanelRoutes from './client/panel.js'
import adminPanelRoutes from './admin/panel.js'

const routes = [
	// Panels
	...clientPanelRoutes,
	...adminPanelRoutes,
	// User login (guard web)
	{
		path: '/logout',
		name: 'logout',
		component: () => import('@/views/auth/LogoutView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/login',
		name: 'login',
		component: () => import('@/views/auth/LoginView.vue'),
	},
	{
		path: '/register',
		name: 'register',
		component: () => import('@/views/auth/RegisterView.vue'),
	},
	{
		path: '/activate/:id/:code',
		name: 'activate',
		component: () => import('@/views/auth/ActivateView.vue'),
	},
	{
		path: '/password',
		name: 'password',
		component: () => import('@/views/auth/PasswordView.vue'),
	},
	{
		path: '/login/f2a/:hash',
		name: 'login.f2a',
		component: () => import('@/views/auth/LoginF2aView.vue'),
		meta: { requiresAuth: false },
	},
	// Logged user only
	{
		path: '/password-change',
		name: 'password.change',
		component: () => import('@/views/auth/PasswordChangeView.vue'),
		meta: { requiresAuth: true },
	},
	{
		path: '/change/email/:id/:code',
		name: 'change.email',
		component: () => import('@/views/auth/EmailChangeView.vue'),
		meta: { requiresAuth: true },
	},
	// Admin login (guard admin)
	{
		path: '/admin/login',
		name: 'admin.login',
		component: () => import('@/views/auth/admin/AdminLoginView.vue'),
		meta: { adminRoute: true },
	},
	{
		path: '/admin/login/f2a/:hash',
		name: 'admin.login.f2a',
		component: () => import('@/views/auth/admin/AdminLoginF2aView.vue'),
		meta: { adminRoute: true },
	},
	{
		path: '/admin/password',
		name: 'admin.password',
		component: () => import('@/views/auth/admin/AdminPasswordView.vue'),
		meta: { adminRoute: true },
	},
	// Logged admin only
	{
		path: '/admin/logout',
		name: 'admin.logout',
		component: () => import('@/views/auth/admin/AdminLogoutView.vue'),
		meta: { adminRoute: true, requiresAdmin: true },
	},
]

export default routes
