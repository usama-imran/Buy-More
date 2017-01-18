<?php
/**
 * Get names of the category, Load products on the view of selected category
 */
class Index_Controller
{
	/**
	 * Load the index view
	 */
	function index()
	{
		require_once 'View/index.php';
	}
	/**
	 * Get list of all the available categories
	 * @return
	 */
	function get_categories()
	{
		include 'Path/include.php';
		$data = array();
		$obj = new Index_Model();
		$result = $obj->get_category(); // getting the result from model function
		foreach ($result as $value)
		{
			$data[] = $value;
		}
		return $data;
	}
	/**
	 * Get list of all the available products by category
	 * @param $id will be posted from the category clicked
	 * @return 
	 */
	function get_products_by_category($id) 
	{
		include '../Model/index_model.php';
		$data = array ();
		$category_id = $id;
		$model_obj = new Index_Model(); // Creating the object of the model class to call its method
		$result = $model_obj->get_product_by_category($category_id);
		foreach ( $result as $value ) 
        {	
        	$data [] = $value;
		}
		return $data;
	}
}

?>