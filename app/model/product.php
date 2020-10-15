<?php

namespace Balobasta\model;
use Balobasta\lib\database\MySqlConnector;

class Product
{
	private $name;
	private $id;
	private $price;
	private $description;
	private $preDescription;
	private $imageLink;

	static public function getProducts(int $page)
	{
		$startID = $page * ITEMSONPAGE + 1;
		$endID = $startID + ITEMSONPAGE - 1;
		$connection = MySqlConnector::getConnection();

		$products = [];

		if ($connection->real_query("Select ID, NAME, PRICE, DESCRIPTION, PREDESCRIPTION, IMAGELINK from product where ID >= {$startID} and ID <= {$endID}"))
		{
			$result = $connection->use_result();
			while ($row = $result->fetch_assoc())
			{
				$products[] = new Product($row['ID'], $row['NAME'], $row['DESCRIPTION'], $row['PREDESCRIPTION'], $row['PRICE'], $row['IMAGELINK']);
			}
		}

		return $products;
	}

	static public function getProduct(int $ID)
	{
		$connection = MySqlConnector::getConnection();
		$result = $connection->query("Select ID, NAME, PRICE, DESCRIPTION, PREDESCRIPTION, IMAGELINK from product where ID = {$ID}");
		$product = null;

		if ($result !== false)
		{
			if ($row = $result->fetch_assoc())
			{
				$product = new Product($row['ID'], $row['NAME'], $row['DESCRIPTION'], $row['PREDESCRIPTION'], $row['PRICE'], $row['IMAGELINK']);
			}
		}

		return $product;
	}

	public function __construct($id, $name, $description, $preDescription, $price, $imageLink)
	{
		$this->imageLink = $imageLink;
		$this->preDescription = $preDescription;
		$this->description = $description;
		$this->price = $price;
		$this->id = $id;
		$this->name = $name;
	}

	public function name()
	{
		return $this->name;
	}

	public function id()
	{
		return $this->id;
	}

	public function price()
	{
		return $this->price;
	}

	public function description()
	{
		return $this->description;
	}

	public function preDescription()
	{
		return $this->preDescription;
	}

	public function imageLink()
	{
		return $this->imageLink;
	}

}
