<?php
include("Path\include.php");
/**
 * Session Authentication, Login, Logout will be hendelled in this class
 */
class Login_Controller
{
	function login()
	{
		require_once 'View/login.php';
	}
	/**
	 * Login & Authentication ,This method will authenticate the user and will create the session if the user is valid
	 * @return void
	 */
	function do_login()
	{
		$user_email = $_REQUEST['email'];
		$user_password = $_REQUEST['password'] ;
		//Model class object creation for getting the users data.
		$model_object = new Login_Model();
		$reslut = $model_object->login($user_email,$user_password);
		if($reslut)
		{
			foreach ($reslut as $value)
			{
				$_SESSION['user_type'] = $value['type'];
				if($_SESSION['user_type'] == 'admin')
				{
					session_start();
					$_SESSION['user_info'] = $value['person_id'];
					$_SESSION['user_name'] = $value ['first_name'];
					$_SESSION['admin'] = true;
					header("Location:../../../Controller/categories_controller/Categories/categories");
				}
				elseif ($_SESSION['user_type'] == 'user')
				{
					session_start();
					$_SESSION['user'] = true;
					$_SESSION['user_info'] = $value['person_id'];
					$_SESSION['user_name'] = $value ['first_name'];
					header("Location:../../../Controller/index_controller/Index_Controller/index");
				}
			}
		}
		else
		{
			$error_message = "Invalid Email/Password";
			echo $error_message;
		}
	}	
	/**
	 * Logout / Session Destroy Method
	 * @return void
	 */
	function do_logout()
	{
		session_start();
		session_unset();
		session_destroy();
		header("Location:../../../Controller/login_controller/Login_Controller/login");
	}
}






?>