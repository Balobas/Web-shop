<?php

namespace Balobasta\controller;

use Balobasta\View\AdminView;

class AdminController
{


	public static function getAdminPanel()
	{
		return AdminView::makeMainAdminPage();
	}
}