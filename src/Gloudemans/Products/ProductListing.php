<?php namespace Gloudemans\Products;

class ProductListing {

	public function __construct()
	{
		if(isset($_POST['listing-type']))
		{
			$type = $_POST['listing-type'];

			if(in_array($type, ['list', 'grid']))
			{
				$_SESSION['listing-type'] = $type;
			}
		}
	}

	public static function getProductListingType()
	{
		if(isset($_SESSION['listing-type']) && ! empty($_SESSION['listing-type']))
		{
			return $_SESSION['listing-type'];
		}

		return 'grid';
	}

}