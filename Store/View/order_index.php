<?php
if(!isset($_SESSION['admin'])) // check if the session exists or not
{
	header("Location:../../../Controller/login_controller/Login_Controller/login");	
}
include("Path\include.php");
?>
<html>
	<head>
		<title>Orders</title>
	</head>
	<body>
	<div class="container">
	<div class="row">
		<?php include '/templates/navbar.php';?>
	</div>
	<fieldset>
	<legend class="well">Orders </legend>
	</fieldset>
	<!-- Requesting categories from the controller and populating the view-->
		<div class="panel-group" id="panel-249471">
		<?php 
		$get_order = new Cart_Controller ();
		$ord_req = $get_order->get_orders ();
		foreach ($ord_req as $ord_value)
		{
		?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<a class="panel-title collapsed" data-toggle="collapse"
						data-parent="#panel-249471" href="#panel-element-<?php echo $ord_value['order_id'] ?>">Order Number: <?php echo $ord_value['order_id']?></a>				
				<input type="checkbox" style="float: right"> 
				</div>
				<div id="panel-element-<?php echo $ord_value['order_id'] ?>" class="panel-collapse collapse">
					<div class="panel-body">
					<table class="table table-striped table-hover">
					<tr>
						<th>Order ID</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Customer Name</th>
					</tr>
						<?php 
						$order_id = $ord_value['order_id'];
						$get_cart = new Cart_Controller ();
						$req = $get_cart->get_cart ($order_id);
						foreach ( $req as $key => $var ) {
							echo "<tr><td>";
							echo $var ['order_id'];
							echo "&nbsp;</td><td>";
							echo $var ['name'];
							echo "&nbsp;</td><td>";
							echo $var ['quantity'];
							echo "&nbsp;</td><td>";
							echo $var ['first_name'];
							echo "&nbsp;</td>";
						}
						?>
						</table>
					</div>
				</div>
			</div>
		<?php 
		}
		?>
		</div>
	</div> <!--Container div ended -->
	</body>
</html>