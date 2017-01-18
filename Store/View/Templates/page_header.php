<?php
include 'Path/include.php';
if(isset($_SESSION['user']))
  {
  $username = $_SESSION['user_name'];
  }
else
  {
  $username = "";
  }
?>
<style>
.header_box
{
background-color: rgba(66, 161, 194, 0.8);
border-radius: 3px;
}
.store_name
{
margin-left:20px;
font-family: Stencil Std;
}
.store_name_sub
{
margin-left: 20px;
font-size: 11px;
font-family: Stencil Std;
}
.welcome_msg
{
border-bottom: solid;
border-bottom-color: gray;
}
.login_btn
{
color:#FFF;
text-decoration:none; 
padding-top: 100px;
transition: .5s;
}
.login_btn:hover
{
color:black;
}
.signup_btn
{
color:#FFF;text-decoration:none;
 border-radius:20px;
 padding-left:20px;
 padding-top:10px;
 padding-bottom:10px;
 padding-right:20px;
 background: rgba(80, 108, 127, 0.8);
 transition: .5s;
}
.signup_btn:hover
{
background: rgba(80, 108, 127, 0.2);
color:black;
}
.log_btn
{
margin-left: 100px;
margin-top: 10px;
}
.user_name
{
  color:black;
  transition: .3s;
}
.user_name:hover
{
  text-decoration: none;
}
</style>
<div class="header_box">
  <table style="width: 100%">
  <tr>
  <td width="25%">
    <h3 class="store_name">Buy More </h3>
    <p class="store_name_sub">We are reliable</p>
  </td>
  <td width="50%">
    <h2 class="welcome_msg">Welcome</h2>
  </td>
  <td width="25%">
    <div class="log_btn">
      <?php 
      if(isset($_SESSION['user']))
      {
        echo '<a href="" class="user_name"><span class="glyphicon glyphicon-user"></span>&nbsp;';
        echo $username;
        echo '</a>';
        echo "&nbsp;&nbsp;";
      	echo '<a href="../../../Controller/login_controller/Login_Controller/do_logout" class="signup_btn" style="text-decoration: none;" >Logout</a>';
      }
      else 
      {
      	echo '<a href="../../../Controller/login_controller/Login_Controller/login" class="login_btn" style="text-decoration: none;">Login</a>';
      	echo '&nbsp;&nbsp;';
      	echo '<a href="" class="signup_btn" style="text-decoration: none;">Signup</a>';
      }
      ?>
    </div>
  </td>
  </tr>
  </table>
</div>