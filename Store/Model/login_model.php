<?php
include("Path\include.php");
/**
 *  Model implementation of Authenticating a user 
 *  @author Usama Imran <usama.imran@rolustech.com>
 */
class Login_Model
{
	/**
	*  Login method to validate a user exists or not
	*  @param $email will be the email input of the user trying to login
	*  @param $password will be the passowrd input of the user trying to login
	*  @return $array
	*/
	public function login($email,$password)
	{
	//databse connection
	$db = new Connection();
	$mysqli = $db->getConnection(); 
	$sql_query = "SELECT * FROM users where email = '$email' and password = '$password' ";
    $result = $mysqli->query($sql_query);
    $array = mysqli_fetch_all($result,true);
    return $array;
	}
}


?>