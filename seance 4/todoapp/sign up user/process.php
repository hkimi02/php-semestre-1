<?php
require_once "../db_connect.php";
$error=[];
if($_POST['submit']){
    extract($_POST);
    if($username="" || $email="" || $password="" || $password2="" || $avatar=""){
        $error="all form feilds should be feild";
        goto show;
    }
}
show:
include "home.phtml";
?>