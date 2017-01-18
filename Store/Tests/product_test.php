<?php
include("..\Controller\login_controller.php");


class Product_Test extends PHPUnit_Framework_TestCase
{
	function test_get_products()
	{
		$pro = new Products();
		$result = $pro->get_products();
		$this->assertNotEmpty($result);
	}	
	
	
	function test_add_new_products()
	{
		$pro = new Products();
		$result = $pro->add_new_products();
	}
	
	
	function test_edit_products()
	{
		$pro = new Products();
		$result = $pro->edit_products();
	}
	

	
}
?>