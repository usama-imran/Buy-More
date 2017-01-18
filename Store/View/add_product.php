<?php 
include("Path\include.php");
if(!isset($_SESSION['admin'])) // checking if the session exists or not.
{
	header("Location:login.php");
}
$logged_in_userID = $_SESSION['user_info']; //storing the logged in user id from session variable
// retriving data for the dropdown list.
$database = new Connection();
$my_conn = $database->getConnection();
$list_category = "SELECT * FROM category";
$category_responce = $my_conn->query($list_category);
$list_products = "SELECT * FROM product";
$product_response = $my_conn->query($list_products);
?>
<html>
	<head>
		<title>Add Product</title>
		<script type="text/javascript" src="../../../View/Assets/JS/bootstrap-filestyle.min.js"> </script>
		<!-- Script to enable and disable the associated product dropdown list -->
		<link rel="stylesheet" href="../../../View/Assets/CSS/form_style.css" />  
		<script type="text/javascript" src="../../../View/Assets/JS/pro_form_validation.js"></script>
		<!-- Javascript to enable & disable associated products  -->
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
		<legend class="well" style="width: 160px">Add Product</legend>
		<form action="../../../Controller/products_controller/Products/add_new_products" method="post" id="pro_form" enctype="multipart/form-data"> 
			<table>
				<tr>
					<td>Name:</td><td><input type="text" name="name" id="name" class="input_fields"></td>
					<td><i><p id="name_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Price:</td><td><input type="number" name="price" id="price" class="input_fields"></td>
					<td><i><p id="price_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Quantity:</td><td><input type="number" name="quantity" id="quantity" class="input_fields"></td>
					<td><i><p id="quantity_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Image:</td><td><input type="file" name="pro_image" id="pro_image" class="input_fields filestyle"  data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="Select Image."></td>
					<td><i><p id="image_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Description:</td><td><textarea rows="4" cols="23" class="input_fields" name="description" style="resize:none" id="description"></textarea></td>
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
						<option value="<?php echo $value['cat_id'] ;?>">
						<?php 
							echo $value['cname'];
							echo "</option>";
						}
						?>
						</select>
					</td>
				<td><i><p id="category_detail" ></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Associated Product</td>
					<td>
						<input type="hidden" name="associated_product_enable"  value="0">
						<input type="checkbox"  name="associated_product_enable" id="associated_product_enable" value="1" onclick = "enable_assoc_products()">
						<select name="associated_product" id="associated_product"  class="hidden_dropdowns" >
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
					Active:</td><td><input type="checkbox"  name="is_active" value="1">
					</td><td><input type="hidden" name="is_active" value="0">
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td></td><td><input type="hidden" name="created_by" value="<?php echo htmlspecialchars($logged_in_userID); ?>"></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-info" aria-label="Left Align">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Add
						</button>
						<a href="../../../Controller/products_controller/Products/products" class="btn btn-warning">
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