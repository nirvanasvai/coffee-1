<?php
	
	return [
		[
			'title' => 'Главная',
			'route' => 'city',
			'routeIs' => 'city',
		],
		[
			'title' => 'Города',
			'route' => 'city.index',
			'routeIs' => 'city.*',
		],
		[
			'title' => 'Компании',
			'route' => 'company.index',
			'routeIs' => 'device.*',
		],
		[
			'title' => 'Устройства',
			'route' => 'device',
			'routeIs' => 'device.*',
		],
		[
			'title' => 'Ошибки',
			'route' => 'error.index',
			'routeIs' => 'error.*',
		],
		[
			'title' => 'Аналитика',
			'route' => 'analytic',
			'routeIs' => 'analytic',
		],
		[
			'title' => 'Выход',
			'route' => 'logout',
		],
	];
