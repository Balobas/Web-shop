<?php

namespace Balobasta\View;
use Balobasta\model\Product;

class ProductView
{
	private static function getHtmlTemplate()
	{
		ob_start();
		require ROOT.'/app/view/template/product.php';
		$productHtml = ob_get_contents();
		ob_end_clean();
		if ($productHtml !== false)
		{
			return $productHtml;
		}

		return '';
	}



	public static function makeProductView(Product $product)
	{
		$productView = ProductView::getHtmlTemplate();
		$productView = str_replace('#description#', $product->description(), $productView);
		$productView = str_replace('#name#', $product->name(), $productView);
		$productView = str_replace('#price#', $product->price().'P', $productView);
		$productView = str_replace('#imagelink#', $product->imageLink(), $productView);
		return $productView;
	}

	public static function makeProductsListView(array $products)
	{
		$list = '<div class="product-list">';

		foreach ($products as $product)
		{
			$list .= self::makeProductView($product);
		}

		$list .= '</div>';

		return $list;
	}

	public static function makeCatalogPageView($products)
	{
		ob_start();
		require ROOT.'/app/view/template/header.php';

		$header = ob_get_contents();
		ob_clean();

		require ROOT.'/app/view/template/footer.php';

		$footer = ob_get_contents();
		ob_end_clean();

		$list = ProductView::makeProductsListView($products);

		return $header.$list.$footer;
	}

	public static function makeHomePageView($products)
	{
		ob_start();
		require ROOT.'/app/view/template/mainheader.php';

		$header = ob_get_contents();
		ob_clean();

		require ROOT.'/app/view/template/footer.php';

		$footer = ob_get_contents();
		ob_end_clean();

		$list = ProductView::makeProductsListView($products);

		return $header.$list.$footer;
	}
}