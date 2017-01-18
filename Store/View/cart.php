<?php
include 'Path/include.php';
?>
<html>
	<head>
		<title>Cart</title>
		<link rel="stylesheet" href="View/Assets/CSS/hover.css" />
		<style>
		.total_sum
		{
		text-align: center;
		font-size: 16;
		}
		hr
		{  
		 border: 0;
		 height: 0; /* Firefox... */
		 box-shadow: 0 0 10px 1px black;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<?php include 'View/templates/page_header.php';?>
			</div>
			<hr>
			<div class="row">
			<fieldset class="well" style="background-color: rgba(106, 44, 175, 0.1);" >
				<legend class="well">Your Cart</legend>
				<table class="table table-hover">
				<th>#</th>
				<th>Name</th>
				<th>P.P.U</th>
				<th>Quantity</th>
				<th>Total</th>
				<th>Remove</th>
				<?php 
				$total_sum = 0;
				$object = new Cart_Controller();
				$arrays = $object->cart_status();
				$number =1;
				foreach ($arrays as $key => $array)
				{
					echo '<tr><td>';
					echo $number++;
					echo '</td>';
					echo '<td>';
					echo $array['product_name'];
					echo '</td><td>';
					echo $array['product_price'];
					echo '</td><td>';
					echo $array['product_quantity'];
					echo '</td><td>';
					echo $array['product_total'];
					echo '</td>';
					echo '<td>';
					echo '<a href="../../../Controller/cart_controller/Cart_Controller/remove_from_array/';
					echo $array['product_name'];
					echo '/';
					echo $array['product_id'];
					echo '"><button class="btn btn-danger">Remove</button></a>';
					echo '</td></tr>';
					$total_sum = $total_sum + $array['product_total'];
				}
				?>
				<tr>
				<td></td><td></td><td></td><td></td>
				<td>
				<p>
				<i>
				<?php echo $total_sum;?>
				</i>
				</p>
				<button class="btn btn-warning" id="checkout">
				  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
				Check Out
				</button>
				<!-- Check if user is logged in -->
				<script type="text/javascript">
				$(function(){
				$("#checkout").on('click',function(){
					$.get('../../../View/session_state.php', function(data) {
					     if( data == "no" ) {
					    	 var retVal = confirm("Please Login to proceed with your request");
								if(retVal == true)
								{
									window.location.href = '../../../Controller/login_controller/Login_Controller/login';
								}	    	 
					     } else if (data == "yes" ) {
					    	 $.post("../../../Controller/cart_controller/Cart_Controller/check_out", function(status){
//						    	 alert("Success");
						    	 window.location.href = '../../../Controller/cart_controller/Cart_Controller/reset_cart';
						    	 });
					     }
					 });
					});
				});
				</script>
				</td>
				<td>
				</td>
				</tr>
				</table>
				<a href="../../../Controller/index_controller/Index_Controller/index"><b>Back To Products</b></a>
			</fieldset>
			</div>
		</div>
	</body>
</html>