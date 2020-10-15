<?php

namespace Balobasta\lib\database;

class MySqlConnector
{
	static private $connection = null;

	public static function getConnection() : \mysqli
	{
		if (self::$connection === null)
		{
			self::$connection = mysqli_init();
			$connectionResult = self::$connection->real_connect(DBHOST, DBUSERNAME, DBPASSWORD, DBNAME);

			if ($connectionResult === false)
			{
				throw new \Exception("Database connection error");
			}
			$result = self::$connection->set_charset("utf8");
			if ($result === false)
			{
				throw new \Exception("Database charset error");
			}
		}

		return self::$connection;
	}
}