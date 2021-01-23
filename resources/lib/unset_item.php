<?php
session_start();
$sending_form_uri = $_SERVER['HTTP_REFERER'];
$id=$_POST['product_id'];
if ( $_SERVER['REQUEST_METHOD'] == "POST" ){
    unset( $_SESSION['cart']["$id"]);
}

header( "Location: " . $sending_form_uri ); exit();