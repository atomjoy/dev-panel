export default {
	links: [
		{ url: '/', title: 'Home', sublinks: [] },
		{
			url: '/services',
			title: 'Services',
			sublinks: [
				{ url: '/service1', title: 'Service 1', subtitle: 'Service 1 description' },
				{ url: '/service2', title: 'Service 2', subtitle: 'Service 2 description' },
				{ url: '/service3', title: 'Service 3', subtitle: 'Service 3 description' },
				{ url: '/service4', title: 'Service 4', subtitle: 'Service 4 description' },
			],
		},
		{
			url: '/about',
			title: 'About',
			sublinks: [
				{ url: '/about1', title: 'About 1', subtitle: 'About 1 description' },
				{ url: '/about2', title: 'About 2', subtitle: 'About 2 description' },
				{ url: '/about3', title: 'About 3', subtitle: 'About 3 description' },
				{ url: '/about4', title: 'About 4', subtitle: 'About 4 description' },
			],
		},
		{
			url: '/support',
			title: 'Support',
			sublinks: [
				{ url: '/support1', title: 'Support 1', subtitle: 'Support 1 description' },
				{ url: '/support2', title: 'Support 2', subtitle: 'Support 2 description' },
			],
		},
	],
}
