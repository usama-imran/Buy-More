<?php
include("..\Controller\cart_controller.php");


class Cart_Test extends PHPUnit_Framework_TestCase
{
	function test_myArray()
	{
		$cart = new Cart_Controller();
		$result = $cart->myArray();
	}
	
	function test_cart_status()
	{
		
		$cart = new Cart_Controller();
		$result = $cart->cart_status();
	}
	
}
?>