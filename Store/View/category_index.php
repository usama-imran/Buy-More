<?php 
if(!isset($_SESSION['admin'])) // checking if the session exists or not
{
	header("Location:../../../Controller/login_controller/Login_Controller/login");	
}
include("Path\include.php");
?>
<html>
	<head>
		<title>Categories</title>
                <script type="text/javascript" src="../../../View/Assets/JS/edit.js"></script>
		<link rel="stylesheet" href="../View/Assets/CSS/form_style.css" />  
	</head>
	<body>
		<div class="container">
			<div class="row"><?php include '/templates/navbar.php';?></div>
			<fieldset>
				<legend class="well">Categories - 
					<a href="../../../Controller/categories_controller/Categories/add"><button class="btn btn-primary" id="add_new_cat"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add New</button></a>
				</legend>
			</fieldset>
			<!-- Requesting categories from the controller and populating the view-->
			<table width = 100% class="table table-striped table-hover ">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Date Created</th>
					<th>Created By</th>
					<th>Edit</th>
				</tr>
				<?php
				$get_cat = new Categories();
				$req = $get_cat-> get_categories();
				//Looping through the array to create the list
				foreach ($req as $var) 
				{
					echo '<tr><td>';
					echo $var['cat_id'];
					echo '</td><td>';
					echo $var['cname'];
					echo '&nbsp;</td><td>';
					echo $var['description'];
					echo '&nbsp;</td><td>';
					echo $var['date_created'];
					echo '&nbsp;</td><td>';
					echo $var['first_name'];
					echo '</td><td>';
					echo '<a value="';echo $var['cat_id']; echo '" class="hvr-pop"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>';
					echo '</td>';
				}
				?>
			</table>
		</div> 
	</body>
</html>