<?php
session_start();
$sending_form_uri = $_SERVER['HTTP_REFERER'];


//if $_SESSION['car'] does not exist, create it
if(!isset($_SESSION['cart'])){
    print("not set");
    $_SESSION['cart'] = [];
}
// checking if method is post
if ( $_SERVER['REQUEST_METHOD'] == "POST" ){
    //getting the variables from the posted form
    $id=$_POST['product_id'];
    $quantity = $_POST['quantity'];
    //checking that quantity is an integer
    if($quantity > 0 ){
        //if we already have one of the item in the cart, add our new quantity to it
        if(isset( $_SESSION['cart']["$id"])){
            $_SESSION['cart']["$id"] += $quantity;
        }
        //otherwise add that item to the cart with quantity as value
        else{
            $_SESSION['cart']["$id"] = $quantity;
        }
    }
    else{
        //remove quantity from item in cart if item in cart exists
        if(isset( $_SESSION['cart']["$id"]) AND ( $_SESSION['cart']["$id"]) + $quantity > 0){
            $_SESSION['cart']["$id"] += $quantity;
        }
        //if the product exists in our session cart and we remove more than we have, remove the item from cart
        if(isset( $_SESSION['cart']["$id"]) AND ( $_SESSION['cart']["$id"]) + $quantity <= 0){
            unset( $_SESSION['cart']["$id"]);
        }
        //
        else{
            null;
        }
    }
}

//go back to where we came from
header( "Location: " . $sending_form_uri ); exit();
