<?php
session_start();
if( empty($_SESSION['user']) ) {
	print "no";
}
else {
	print "yes";
}
?>