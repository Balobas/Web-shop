<?php

spl_autoload_register(function ($className)
{
	$prefix = 'Balobasta\\';

	if (strpos($className, $prefix) === false)
	{
		echo $className;
		return;
	}
	else
	{

		$relativeClassName = substr($className, strlen($prefix));
		$file = __DIR__.'/'.strtolower(str_replace('\\', '/', $relativeClassName)).'.php';

		if (file_exists($file) === true)
		{
			require $file;
		}

	}
});
