import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '@/stores/auth.js'
import HomeView from '@/views/page/HomeView.vue'
import authRoutes from '@/router/auth/routes.js'

const router = createRouter({
	linkActiveClass: 'main-header__navlink--active',
	history: createWebHistory('/'),
	routes: [
		...authRoutes, // Auth, admin, client
		{
			path: '/',
			name: 'home',
			component: HomeView,
		},
		{
			path: '/about',
			name: 'about',
			component: () => import('../views/page/AboutView.vue'),
		},
		{
			path: '/services',
			name: 'services',
			component: () => import('../views/page/ServicesView.vue'),
		},
		{
			path: '/support',
			name: 'support',
			component: () => import('../views/page/SupportView.vue'),
		},
		{
			path: '/demo/input',
			name: 'demo.input',
			component: () => import('@/components/input/example/DemoPageView.vue'),
		},
		{
			path: '/demo/code',
			name: 'demo.code',
			component: () => import('@/views/demo/CodeView.vue'),
		},
		// Logged users only
		// {
		// 	path: '/panel/dummy',
		// 	name: 'panel.dummy',
		// 	component: () => import('../views/panel/DummyView.vue'),
		// 	meta: { requiresAuth: true },
		// },
		// Enable vue-router fallback without 404 error code (catchall)
		{
			path: '/:catchAll(.*)',
			name: 'error.404',
			component: () => import('../views/error/404.vue'),
		},
	],
	// always scroll to top
	scrollBehavior(to, from, savedPosition) {
		return { top: 0 }
	},
})

router.beforeEach(async (to, from, next) => {
	// ✅ This will work make sure the correct store is used for the current running app
	const auth = useAuthStore()
	// ✅ Login with remember me token and/or check is user authenticated
	if (to.meta.adminRoute) {
		await auth.isAuthenticatedAdmin()
	} else {
		await auth.isAuthenticated()
	}
	// If admin route not authenticated
	if (to.meta.requiresAdmin) {
		if (!auth.isLoggedIn.value || auth.getUser.value.is_admin != 1) {
			// ✅ Redirect to login if not logged or not admin
			next({ name: 'admin.login', query: { redirected_from: to.fullPath } })
		}
	}
	// Routes
	if (to.meta.adminRoute) {
		// Admin routes
		// ✅ Redirect to admin panel if logged
		if (to.name == 'admin.login' && auth.isLoggedIn.value) {
			// Panel route name here: panel or client.panel
			next({ name: 'admin.panel' })
		} else if (to.meta.requiresAdmin && !auth.isLoggedIn.value) {
			// ✅ Redirect to login if not logged
			next({ name: 'admin.login', query: { redirected_from: to.fullPath } })
		} else {
			// ✅ Continue
			next()
		}
	} else {
		// User routes
		// ✅ Redirect to panel if logged
		if (to.name == 'login' && auth.isLoggedIn.value) {
			// Panel route name here: panel or client.panel
			next({ name: 'panel' })
		} else if (to.meta.requiresAuth && !auth.isLoggedIn.value) {
			// ✅ Redirect to login if not logged
			next({ name: 'login', query: { redirected_from: to.fullPath } })
		} else {
			// ✅ Continue
			next()
		}
	}
})

// router.beforeEach(async (to, from, next) => {
// 	// ✅ This will work make sure the correct store is used for the current running app
// 	const auth = useAuthStore()
// 	// ✅ Login with remember me token and/or check is user authenticated
// 	await auth.isAuthenticated()
// 	// ✅ Redirect to panel if logged
// 	if (to.name == 'login' && auth.isLoggedIn.value) {
// 		next({ name: 'panel' })
// 	} else if (to.meta.requiresAuth && !auth.isLoggedIn.value) {
// 		// ✅ Redirect to login if not logged
// 		next({ name: 'login', query: { redirected_from: to.fullPath } })
// 	} else {
// 		// ✅ Continue
// 		next()
// 	}
// })

export default router
