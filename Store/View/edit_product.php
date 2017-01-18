<?php 
include("Path\include.php");
if(!isset($_SESSION['admin']))
{
	header("Location:../../../Controller/login_controller/Login_Controller/login");	
}
$logged_in_userID = $_SESSION['user_info'];
$database = new Connection();
$my_conn = $database->getConnection();
$list_category = "SELECT * FROM category";
$category_responce = $my_conn->query($list_category);
$list_products = "SELECT * FROM product";
$product_response = $my_conn->query($list_products);
// getting the details of the slected product to edit
if(!empty($_GET))
{
	$url = explode("/", $_SERVER['REQUEST_URI']);
	$product_id = $url[6];
}
$product_details = "SELECT * FROM product WHERE product_id = '$product_id'";
$pro_query_result = $my_conn->query($product_details);
foreach ($pro_query_result as $pro_form_var)
{
	$pro_name = $pro_form_var['name'];
	$pro_price = $pro_form_var['price'];
	$pro_description = $pro_form_var['description'];
	$pro_cat_id = $pro_form_var['cat_id'];
	$pro_is_active = $pro_form_var['is_active'];
}
?>
<html>
	<head>
		<title>Edit Product</title>
		<script type="text/javascript" src="../View/Assets/JS/pro_form_validation.js"></script>
        <link rel="stylesheet" href="../View/Assets/CSS/form_style.css" /> 
		<!-- Script to enable and disable the associated product dropdown list -->
		<script type="text/javascript">
		function disable_assoc_products()
		{
			var drop_down = document.getElementById("associated_product");
	        drop_down.setAttribute("disabled", true);
	        drop_down.style.visibility = 'hidden';
		}
		function enable_assoc_products() 
		{
			var check_box = document.getElementById("associated_product_enable");
			var drop_down = document.getElementById("associated_product");
			if(check_box.checked)
			{
				drop_down.removeAttribute("disabled");
				drop_down.style.visibility = 'visible';	
			}
			else if(check_box.checked == false)
			{
				drop_down.setAttribute("disabled", true);
				drop_down.style.visibility = 'hidden';	
			}
		}
		</script>
	</head>
	<body onload="disable_assoc_products()">
	<div class="container">
	<div class="row">
		<?php include '/templates/navbar.php';?>
	</div>
	<fieldset class="well">
		<legend class="well" style="width: 160px">Edit Product</legend>
		
		<form action="../../../../Controller/products_controller/Products/edit_products" method="post" id="pro_form"> 
			<table>
			<tr>
				<td>Name:</td><td><input class="input_fields" type="text" name="name" value="<?php echo $pro_name;?>" id="name"></td>
				<td><i><p id="name_detail" class="error_text"></p></i></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>Price:</td><td><input  class="input_fields" type="number" name="price" value="<?php echo $pro_price;?>" id="price"></td>
				<td><i><p id="price_detail" class="error_text"></p></i></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>Description:</td><td><textarea class="input_fields" type="text" name="description"  id="description"><?php echo $pro_description;?></textarea></td>
				<td><i><p id="description_detail" class="error_text"></p></i></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>Category</td>
				<td>
					<select name="category" id="category" class="input_fields">
						<option value="null" >--Select Category--</option>
						<?php 
						foreach ($category_responce as $value)
						{ 
						?>
						<option value="<?php echo $value['cat_id'] ;?> " <?php if($value['cat_id'] == $pro_cat_id){echo("selected");}?>>
						<?php 
							echo $value['cname'];
							echo "</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>Associated Product</td>
			<td>
				<input type="hidden" name="associated_product_enable"  value="0">
				<input type="checkbox" name="associated_product_enable" id="associated_product_enable" value="1" onclick = "enable_assoc_products()">
				<select name="associated_product" id="associated_product" class="hidden_dropdowns">
					<option>--Select Product--</option>
					<?php 
						foreach ($product_response as $value)
						{ 
						?>
						<option value="<?php echo $value['product_id'] ;?>">
						<?php 
							echo $value['name'];
							echo "</option>";
						}
					?>
				</select>
			</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>
				Active:</td><td><input type="checkbox" name="is_active" value="1">
				</td><td><input type="hidden" name="is_active" value="0">
				</td>
			</tr>
				<tr><td>&nbsp;</td></tr>
			<tr>
				<td></td><td><input type="hidden" name="created_by" value="<?php echo htmlspecialchars($logged_in_userID); ?>">
				<input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button type="submit" class="btn btn-info" aria-label="Left Align">
						<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Save
					</button>
					<a href="../../../../Controller/products_controller/Products/products" class="btn btn-warning">
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