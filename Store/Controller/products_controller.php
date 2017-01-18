<?php
include("Path\include.php");
/**
 * CRUD operations on products on controller level
 * @author Usama Imran <usama.imran@rolustech.com>
 */
class Products
{
    /**
    * Will load the view product index for admin panel
    */
    function products()
    {
        require_once 'View/product_index.php';
    }
    /**
    * Get list of all the products and store them in an array
    * @return $data
    */
    public function get_products()
    {
        $data = array();
        $obj = new Product();
        $result = $obj->get_product(); // getting the result from model function
        foreach ($result as $value)
        {
            $data[] = $value;	 // storing the result in the data array
        }
        return $data;
    }
    /**
    * Will load the view add product for admin panel
    */
    function add()
    {
        ob_end_clean();
        require_once 'View/add_product.php';
    }
    /**
    * Adding a new product
    * @return void
    */
    function add_new_products()
    {
        //getting the details of the immage and moving it to the uploads folder
        $product_image = "No Image";
        $target_path = "View/Assets/Images/";
        $target_path = $target_path.basename( $_FILES['pro_image']['name']);
        move_uploaded_file($_FILES['pro_image']['tmp_name'], $target_path); // image moved to uploads folder
        $product_image= $_FILES['pro_image']['name']; //will store the name of the image in a variable
        //getting the input fields posted from the form
        $product_name = $_REQUEST['name'];
        $product_price = $_REQUEST['price'];
        $product_description = $_REQUEST['description'];
        $product_category = $_REQUEST['category'];
        $product_is_active = $_REQUEST['is_active'];
        $product_created_by = $_REQUEST['created_by'];
        $product_quantity = $_REQUEST['quantity'];
        // Model object creation to call the model function of inserting the data
        $product_obj = new Product();
        $response =$product_obj->add_new_product($product_name,$product_price,$product_image,$product_quantity,$product_description,$product_category,$product_is_active,$product_created_by);
        //chek if there are any associated products. by default it will be 0
        $associated_product_enable = $_REQUEST['associated_product_enable'];
        // if there are associated products than this function
        if($associated_product_enable == 1)
        {
            $associated_product_id = $_REQUEST['associated_product'];
            $associated_product_obj = new Associated_Product();
            $associated_product_obj->create_associated_product($associated_product_id);
        }
        header("Location:../../../Controller/products_controller/Products/products");
    }
    /**
    * Will load the view edit product for admin panel
    */
    function edit()
    {
        ob_end_clean();
        require_once 'View/edit_product.php';
    }
    /**
    * Updating an existing product
    * @return void
    */
    function edit_products()
    {
        // requesting the data from the posted form
        $product_name = $_REQUEST['name'];
        $product_price = $_REQUEST['price'];
        $product_description = $_REQUEST['description'];
        $product_category = $_REQUEST['category'];
        $product_is_active = $_REQUEST['is_active'];
        $product_created_by = $_REQUEST['created_by'];
        $product_id = $_REQUEST['product_id'];
        // Creating the model object to call the model function for the insertion of data
        $product_obj = new Product();
        $response =$product_obj->edit_product($product_name,$product_price,$product_description,$product_created_by,$product_is_active,$product_category,$product_id);
        // check if ther are any associated produts. 
        $associated_product_enable = $_REQUEST['associated_product_enable'];
        if($associated_product_enable == 1)
        {
            $associated_product_id = $_REQUEST['associated_product'];
            $associated_product_obj = new Associated_Product();
            $associated_product_obj->create_associated_product($associated_product_id);
        }
        header("Location:../../../Controller/products_controller/Products/products");
    }
}
?>