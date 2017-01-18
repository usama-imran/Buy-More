<?php include("Path\include.php"); 
if(isset($_SESSION['admin']))
{
$username = $_SESSION['user_name'];
}
else
{
$username = "";
}
?>
<link rel="stylesheet" href="../../../View/Assets/CSS/hover.css" />
<!-- navigarion bar implementation -->
<nav class="navbar navbar-default" >
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="hvr-underline-from-left" ><a href="../../../Controller/categories_controller/Categories/categories">Categories</a></li>
      <li class="hvr-underline-from-left"><a href="../../../Controller/products_controller/Products/products">Products</a></li>
      <li class="hvr-underline-from-left"><a href="../../../Controller/cart_controller/Cart_Controller/orders">Orders</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href=""><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
      <li class="hvr-sweep-to-right"><a href="../../../Controller/login_controller/Login_Controller/do_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav> 