<?php
include("Path/include.php");
/**
* Class holding all the CRUD operations of Categories on Controller level 
*/
class Categories
{
    /**
    * Will load the categories view for the admin panel
    */
    function categories()
    {
        require_once 'View/category_index.php';
    }
    /**
    * Will get a list of all the categories from the database
    * @return $data 
    */
    function get_categories()
    {
        $data = array();
        require_once 'Model/category_model.php';
        $obj = new Category();
        $result = $obj->get_category(); // getting the result from model function
        foreach ($result as $value)
        {
            $data[] = $value;	
        }
        return $data;
    }
    /**
    * Will load the add category view for the admin panel
    */
    function add()
    {
        ob_end_clean();
        require_once 'View/add_category.php';
    }
    /**
    * Will request the posted data from the form to create a new product
    */
    function add_new_categories()
    {
        // requesting the inputs from the posted form
        $cat_name = $_REQUEST['name'];
        $cat_description = $_REQUEST['description'];
        $cat_is_active = $_REQUEST['is_active'];
        $cat_created_by = $_REQUEST['created_by'];
        // Creating the object of the model class to call its method to post requested data
        $model_obj = new Category();
        $model_obj->add_new_category($cat_name,$cat_description,$cat_is_active,$cat_created_by);
        header("Location:../../../Controller/categories_controller/Categories/categories");
    }
    /**
    *Will get the post id of the category, and will update the information
    */
    function edit_categories()
    {
        // requesting the inputs from the posted form
        $cat_name = $_REQUEST['cat_name'];
        $cat_description = $_REQUEST['cat_description'];
        $cat_id = $_REQUEST['cat_id'];
        // Creating the object of the model class to call its method to post requested data
        $model_obj = new Category();
        $model_obj->edit_category($cat_name,$cat_description,$cat_id);
    }
}
?>