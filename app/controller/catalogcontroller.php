<?php

namespace Balobasta\controller;
use Balobasta\View\ProductView;
use Balobasta\View\ViewGenerator;
use Balobasta\model\Product;

class CatalogController
{

	public function getProductsList($data)
	{
		if (!isset($data['page']))
		{
			$page = 0;
		}
		else
		{
			$page = $data['page'];
		}

		$products = Product::getProducts($page);
		return ProductView::makeProductsListView($products);
	}

	public function getProduct($data)
	{
		if (!isset($data['id']))
		{
			$id = 1;
		}
		else
		{
			$id = $data['id'];
		}

		$product = Product::getProduct($id);
		return ProductView::makeProductView($product);
	}

	public function getCatalogPage($data)
	{
		if (!isset($data['page']))
		{
			$page = 0;
		}
		else
		{
			$page = $data['page'];
		}

		$products = Product::getProducts($page);
		return ProductView::makeCatalogPageView($products);
	}

	public function getHomePage()
	{
		$products = Product::getProducts(0);
		return ProductView::makeHomePageView($products);
	}

}