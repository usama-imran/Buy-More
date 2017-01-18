<?php 
//include '../Path/include.php';
?>
<div class="row">
<script type="text/javascript" src="../../../View/Assets/JS/add_to_cart.js"></script>
<?php 
if(!empty($_POST))
{
	$idd = $_POST['catid']; // this will be the id of the category clicked
	include '../Controller/index_controller.php';
}
$get_products = new Index_Controller();
$products = $get_products->get_products_by_category($idd);
foreach ($products as $item)
{
	echo'<div class="col-sm-6 col-md-4">';
	echo '<div class="thumbnail" data-value="';
	echo $item['product_id'];
	echo'">';
	echo '<img src="../../../View/Assets/Images/';
	echo $item['image'];
	echo '">';
	echo '<div class="caption">';
	echo '<h4 class="center_text" id="pro_name';
	echo $item['product_id'];
	echo'">';
	echo $item['name'];
	echo '</h4>';
	echo '<p class="center_text" id="pro_price';
	echo $item['product_id'];
	echo'">';
	echo $item['price'];
	echo '</p>';
	echo '<p class="center_text"id="pro_description';
	echo $item['product_id'];
	echo'">';
	echo $item['description'];
	echo '</p>';
	echo '<center><input type="number" placeholder="Enter Quantity" min="1" class="input_fields" id="quantity';
	echo $item['product_id'];
	echo '" data-value="';
	echo $item['product_id'];
	echo '"></center>';
	echo '<p class="center_text" solid 1px">Total:';
	echo '<p class="center_text" id="total';
	echo $item['product_id'];
	echo '">0</p></p>';
	echo '<center><button class="btn btn-danger" id="select_product" data-value="';
	echo $item['product_id'];
	echo'">';
	echo '<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>';
	echo ' &nbsp;Add to cart</button></center>';
	echo '</div></div></div>';
}
?>
</div> <!-- Row Ended -->