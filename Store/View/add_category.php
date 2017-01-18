<?php
include("Path\include.php");
// check if the user is logged in or not
if(!isset($_SESSION['admin']))
{
	header("Location:../../../Controller/login_controller/Login_Controller/login");
}
//requesting the logged in user id from the session variable
$logged_in_userID = $_SESSION['user_info'];
?>
<html>
	<head>
		<title>Add Category</title>
		<script type="text/javascript" src="../../../View/Assets/JS/cat_form_validation.js"></script>
		<link rel="stylesheet" href="../../../View/Assets/CSS/form_validation.css" />
		<link rel="stylesheet" href="../../../View/Assets/CSS/form_style.css" />  		
	</head>
	<body>
	<div class="container">
	<div class="row">
		<!-- including the navigation bar template -->
		<?php include '/templates/navbar.php';?>			
	</div>
	<fieldset class="well">
		<legend class="well" style="width:180px ">Add Category</legend>
		
		<!-- Form Started -->
		<form action="../../../Controller/categories_controller/Categories/add_new_categories" method="post" id="cat_form" >
			<table>
				<tr>
					<td>Name:</td><td><input type="text" class="input_fields" name="name" id="name" ></td><td><i><p id="name_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Description:&nbsp;</td><td><textarea rows="4" cols="23" name="description" id="description" class="input_fields" style="resize:none"></textarea></td><td><i><p id="description_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Active:</td><td><input class="chekbox_click" type="checkbox" name="is_active" value="1" id="is_active"></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td></td><td><input type="hidden" name="created_by" value="<?php echo htmlspecialchars($logged_in_userID); ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-info" aria-label="Left Align">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Add
						</button>
						<a href="../../../Controller/categories_controller/Categories/categories" class="btn btn-warning">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Cancel
						</a>
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
	</div>
	</body>
</html>