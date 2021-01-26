<?php
session_start();
require_once 'access_controle.php';
$sending_form_uri = $_SERVER['HTTP_REFERER'];
//if $_SESSION['cart'] does not exist, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
// checking if method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //getting the variables from the posted form
    $id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $name = $_POST['product_name'];
    //checking that quantity is an integer
    if ($quantity > 0) {

        //if we already have one of the item in the cart, add our new quantity to it
        if (isset($_SESSION['cart']["$id"])) {
            $_SESSION['cart']["$id"] += $quantity;
            $_SESSION['msgs']['addedToCart'] = "You have succesfully added $quantity $name to your cart";
        }
        //otherwise add that item to the cart with quantity as value
        else {
            $_SESSION['cart']["$id"] = $quantity;
            $_SESSION['msgs']['addedToCart'] = "You have succesfully added $quantity $name to your cart";
        }
    } else {
        if ($quantity < 0) {
            //remove quantity from item in cart if item in cart exists
            if (isset($_SESSION['cart']["$id"]) and ($_SESSION['cart']["$id"]) + $quantity > 0) {
                $_SESSION['cart']["$id"] += $quantity;
                $_SESSION['msgs']['removedCart'] = "You have succesfully removed $quantity $name to your cart";
            }
            //if the product exists in our session cart and we remove more than we have, remove the item from cart
            elseif (isset($_SESSION['cart']["$id"]) and ($_SESSION['cart']["$id"]) + $quantity <= 0) {
                $_SESSION['msgs']['removedCart'] = "You have succesfully removed " . ($_SESSION['cart']["$id"]) . " $name from your cart";
                unset($_SESSION['cart']["$id"]);
            }
            //

            else {
                $_SESSION['msgs']['removedCart'] = "There weren't any $name in your shopping cart";;
            }
        }
    }
}

//go back to where we came from
header("Location: " . $sending_form_uri);
exit();
