<?php
/**
* CRUD Operations on categories on Model level
*/
class Category
{
	/**
	* Method to list all the rows of the table
	* @return $array
	*/
	function get_category()
	{
	// connection to the database
	$db = new Connection();
	$mysqli = $db->getConnection(); 
	$sql_query = "SELECT category.cat_id,category.cname,category.description,category.date_created , users.first_name FROM category JOIN users ON category.created_by=users.person_id;";
    $result = $mysqli->query($sql_query);
    $array = mysqli_fetch_all($result,true);
    return $array;
	}
	/**
	* Method to add new category
	* @return void
	*/
	function add_new_category($name,$description,$is_active,$created_by)
	{
	// connection to the database
	$db = new Connection();
	$mysqli = $db->getConnection();
	$sql_query = "INSERT INTO `category` (`cat_id`, `cname`, `description`, `created_by`, `is_active`, `date_created`) 
	VALUES (NULL, '$name', '$description', '$created_by', '$is_active', CURRENT_TIMESTAMP);";
    $mysqli->query($sql_query);
	}
	/**
	* Method to edit an existing category
	* @return void
	*/
	function edit_category($name,$description,$category_id)
	{
	// connection to the database
	$db = new Connection();
	$mysqli = $db->getConnection();
	$sql_query = "UPDATE `category` SET `cname` = '$name' ,`description` = '$description'  WHERE `category`.`cat_id` = '$category_id';";
	$mysqli->query($sql_query);
	}
}
?>