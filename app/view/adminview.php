<?php

namespace Balobasta\View;

class AdminView
{

	public static function getHtmlTemplate()
	{
		ob_start();
		require ROOT.'/app/view/template/adminpanel.php';
		$productHtml = ob_get_contents();
		ob_end_clean();
		if ($productHtml !== false)
		{
			return $productHtml;
		}

		return '';
	}

	public static function makeMainAdminPage()
	{
		ob_start();
		require ROOT.'/app/view/template/adminheader.php';

		$header = ob_get_contents();
		ob_clean();

		require ROOT.'/app/view/template/footer.php';

		$footer = ob_get_contents();
		ob_end_clean();

		return $header.self::getHtmlTemplate().$footer;
	}
}