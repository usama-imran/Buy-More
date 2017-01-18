<?php
include("..\Controller\index_controller.php");


class Index_Test extends PHPUnit_Framework_TestCase
{
	function test_get_categories()
	{
		$cat = new Index_Controller();
		$result = $cat->get_categories();
		$this->assertNotEmpty($result);	
	}	
	
	function test_get_products_by_category()
	{
		$cat = new Index_Controller();
		$result = $cat->get_products_by_category(1);
		$this->assertNotEmpty($result);
	}
	
}
?>