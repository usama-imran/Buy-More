<?php
include("Path\include.php");
/**
* Handelling of the asociated products will be done in this class implementation
*/
class Associated_Product
{
	/**
	 * Create an associated product if there is one.
	 * @param $product_id will be the product to be associated with
	 * @return void
	 */
	function create_associated_product($product_id)
	{
		$db = new Connection();
		$mysqli = $db->getConnection();
		$sql_query = "INSERT INTO `associate_product` (`associate_product_id`, `product_id`) VALUES (NULL, '$product_id');";
		$mysqli->query($sql_query);
	}
}
?>