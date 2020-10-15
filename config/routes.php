<?php

define('ROUTES', $routes = [
	// путь "shop/"
	'/^\/$/' => ['controller' =>'CatalogController', 'action' => 'getHomePage', 'method' => 'get'],

	//	шаблон /catalog/page/число
	"/^\/catalog\/page\/(?<page>[0-9]+)$/" => ['controller' =>'CatalogController', 'action' => 'getCatalogPage','method' => 'get'],
	// шаблон запроса на страницу товара
	"/^\/item\/(?<id>[0-9]+)$/" => ['controller' => 'CatalogController', 'action' => 'getProduct', 'method' => 'get'],

	"/^\/admin$/" => ['controller' => 'AdminController', 'action' => 'getAdminPanel', 'method' => 'get'],
]);
