<?php 
if(!isset($_SESSION['admin'])) // check if the session exists or not
{
	header("Location:../../../Controller/login_controller/Login_Controller/login");	
}
include("Path\include.php");
?>
<html>
	<head>
		<title>Products</title>
	</head>
	<body>
	<div class="container">
	<div class="row">
		<?php include '/templates/navbar.php';?>
	</div>
	<fieldset class="">
	<legend class="well">Products - <a href="../../../Controller/products_controller/Products/add"><button class="btn btn-primary" ><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add New</button></a></legend>
	</fieldset>
	<!-- Requesting categories from the controller and populating the view-->
	<table width = 100% class="table table-striped table-hover">
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Description</th>
			<th>Category</th>
			<th>Date Created</th>
			<th>Created By</th>
			<th>Edit</th>
		</tr>
		<?php
		$get_product = new Products();
		$req = $get_product-> get_products();
		//Looping through the array to create list of products
		foreach ($req as $key=>$var) 
		{
			echo "<tr><td>";
			echo $var['name'];
			echo "&nbsp;</td><td>";
			echo $var['price'];
			echo "&nbsp;</td><td>";
			echo $var['quantity'];
			echo "&nbsp;</td><td>";
			echo $var['description'];
			echo "&nbsp;</td><td>";
			echo $var['cname'];
			echo "&nbsp;</td><td>";
			echo $var['date_created'];
			echo "</td><td>";
			echo $var['first_name'];
			echo "&nbsp;</td><td>";
		?>
		<a href="../../../Controller/products_controller/Products/edit/<?php echo $var['product_id']?>" class="hvr-pop"><span class="glyphicon glyphicon-edit"></span> </a>
		<?php 
		}
		?>
	</table>
	</div>
	</body>
</html>