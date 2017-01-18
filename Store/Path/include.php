<?php
ob_start(); // to solve the error header already sent
// Including Models
require_once("config.php");
require_once("Model\category_model.php");
require_once("Model\login_model.php");
require_once("Model\product_model.php");
require_once("Model\associated_product_model.php");
require_once("Model\index_model.php");

// Including Controllers
require_once("Controller\categories_controller.php");
require_once("Controller\login_controller.php");
require_once("Controller\products_controller.php");
require_once("Controller\index_controller.php");
require_once("Controller\cart_controller.php");
?>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script> -->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">