<?php

namespace Balobasta\lib;
use Balobasta\controller;


class Router {

	private function __construct()
	{}

	// ищется подходящий шаблон и вызывается соответствующий метод соответствущего контроллера
	public static function run($url)
	{

		if (!require ROOT.'/config/routes.php')
		{
			throw new \Exception('cant find routes');
		}

		foreach (ROUTES as $pattern => $routeData) {

			if (preg_match($pattern, $url, $params))
			{
				//из массива $params удаляется сам url
				array_shift($params);


				$controller = $routeData['controller'];
				$action = $routeData['action'];

				//Инстанцируем контроллер
				$controller = 'Balobasta\\controller\\'.$controller;
				$con = new $controller;
				//вызываем нужный метод контроллера
				return call_user_func([$con, $action], $params);

			}
		}

		//если не нашлось подходящего шаблона, то сервер этот запрос не обрабатывает, возвращаем страницу ошибки
		return "ne";
	}

}