<?php
session_start();
$url = explode("/", $_SERVER['REQUEST_URI']);
if ($url[2]=="")
{
    header("Location:Controller/index_controller/Index_Controller/index");
}
if($url[2]=="Controller")
{
    include 'Controller/'.$url[3].'.php';
    $obj=new $url[4]();
    if($url[5]!="" && !isset($url[6]) && !isset($url[7]))
    {
        $obj->$url[5]();
    }
    if(isset($url[5]) && isset($url[6]))
    {
        $obj->$url[5]();
    }
    if(isset($url[6]) && isset($url[7]))
    {
        $obj->$url[5]($url[6],$url[7]);
    }
}     
?>