<?php
include("..\Controller\categories_controller.php");


class Categories_Test extends PHPUnit_Framework_TestCase
{
	function test_get_categories()
	{
		$cat = new Categories();
		$result = $cat->get_categories();
		$this->assertNotEmpty($result);	
	}

	function test_add_new_categories()
	{
		$cat = new Categories();
		$result = $cat->add_new_categories();
	}
	
	function test_edit_categories()
	{
		$cat = new Categories();
		$result = $cat->edit_categories();
	}
	
	
	
}
?>