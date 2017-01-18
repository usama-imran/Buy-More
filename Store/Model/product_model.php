<?php
include("Path\include.php");
/**
 * Model Class implementation for CRUD operations on products.
 */
class Product
{
	/**
	* Get list of all the products from the database table
	* @return $array
	*/
	function get_product()
	{
	//getting the connection to the database
    $db = new Connection();
	$mysqli = $db->getConnection(); 
	//query using joins to get the required data
	$sql_query = "SELECT product.product_id,product.cat_id,product.name,product.price,product.quantity,product.description,product.date_created , users.first_name ,category.cname
			FROM product 
            JOIN users ON product.created_by=users.person_id
            JOIN category ON product.cat_id=category.cat_id";
	$result = $mysqli->query($sql_query);
    $array = mysqli_fetch_all($result,true);
    return $array;
	}
	/**
	* Add a new product to database table
	* @param $name will be the name of the product
	* @param $price will be the price of the product
	* @param $image will be the name of the immage 
	* @param $quantity will be the number of items
	* @param $description will be the detailed discription of the product
	* @param $category will tell the category of the created product
	* @param $is_active is the state of the product(Available\Not Available)
	* @param $created_by will be the id of the person logged in
	* @return void
	*/
	function add_new_product($name,$price,$image,$quantity,$description,$category,$is_active,$created_by)
	{
	$db = new Connection();
	$mysqli = $db->getConnection();
	$sql_query = "INSERT INTO `product` (`product_id`, `name`, `price`, `description`,`quantity`,`image`, `date_created`, `created_by`, `is_active`, `cat_id`) 
	VALUES (NULL,'$name','$price','$description','$quantity','$image',CURRENT_TIMESTAMP,'$created_by','$is_active','$category');" ;
    $mysqli->query($sql_query) or trigger_error("Query Failed! SQL: $sql_query - Error: ".mysqli_error(), E_USER_ERROR);
	}
	
	/**
	* Update an existing product
	* @param $name will be the name of the product
	* @param $price will be the price of the product
	* @param $description will be the detailed discription of the product
	* @param $created_by will be the id of the person logged in
	* @param $is_active is the state of the product(Available\Not Available)
	* @param $cat_id will tell the category of the created product
	* @param $product_id will be the id of the product to be edited
	* @return void
	*/
	function edit_product($name,$price,$description,$created_by,$is_active,$cat_id,$product_id)
	{
		$db = new Connection();
		$mysqli = $db->getConnection();	
		$sql_query = "UPDATE `product` SET `name` = '$name', 
				`price` = '$price', `description` = '$description', 
				`date_created` = CURRENT_TIMESTAMP, `created_by` = '$created_by', 
				`is_active` = '$is_active', `cat_id` = '$cat_id' WHERE `product`.`product_id` = '$product_id';";
		$mysqli->query($sql_query);
	}
}
?>