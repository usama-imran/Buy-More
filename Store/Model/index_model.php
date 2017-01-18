<?php
/**
 *  Model implementation for index/landing page, CRUD operations on model level
 */
class Index_Model
{
	/**
	 *  Get the list of all the available categories having products in them
	 * @return $array
	 */
	function get_category()
	{
		include 'Path/include.php';
		$db = new Connection();
		$mysqli = $db->getConnection();		$sql_query = "SELECT category.cat_id, category.cname, count(product.cat_id ) 
				FROM category RIGHT OUTER JOIN product ON category.cat_id = product.cat_id GROUP BY product.cat_id ORDER BY category.cname";
		$result = $mysqli->query($sql_query);
		$array = mysqli_fetch_all($result,true);		
		return $array;
	}
	/**
	*  Get all the products by category from the database
	* @param $cat_id will tell which category products are to be loaded
	* @return $array
	*/
	function get_product_by_category($cat_id)
	{
		include '../config.php';
		$db = new Connection();
		$mysqli = $db->getConnection();
		$sql_query = "SELECT * FROM product WHERE `cat_id` = '$cat_id'";
		$result = $mysqli->query($sql_query);
		$array = mysqli_fetch_all($result,true);
		return $array;
	}
}

?>