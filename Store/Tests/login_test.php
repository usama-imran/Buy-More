<?php
include("..\Controller\login_controller.php");


class Login_Test extends PHPUnit_Framework_TestCase
{
	function test_do_login()
	{
		$cat = new Login_Controller();
		$result = $cat->do_login();
	}	
	
}
?>