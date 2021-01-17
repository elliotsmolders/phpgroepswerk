<?php
function printHead ($class =""){
    $header = file_get_contents("../resources/templates/header.html");
    $header = str_replace("@BODYCLASS@",$class,$header);
    print $header;
}

function printNav (){
    $html = file_get_contents("../resources/templates/navbar.html");
    print $html;
}
function printDetail(){
    $html = file_get_contents("../resources/templates/detail.html");
    print $html;
}
function printShopping(){
    $html = file_get_contents("../resources/templates/shopping_cart.html");
    print $html;
}
function printLogin(){
    $html = file_get_contents("../resources/templates/login.html");
    print $html;
}
function printSignup(){
    $html = file_get_contents("../resources/templates/signup.html");
    print $html;
}
function printFooter(){
    $footer = file_get_contents("../resources/templates/footer.html");
    print $footer;
}
function printHomeTop(){
    $html = file_get_contents("../resources/templates/home_top.html");
    print $html;
}
function printHomeBottom(){
    $html = file_get_contents("../resources/templates/home_bottom.html");
    print $html;
}
function printHomeProduct(){
    $productHtml = file_get_contents("../resources/templates/product_home.html");
    print $productHtml;
}
function printStarFull(){
    $html = file_get_contents("../resources/templates/star_full.html");
    print $html;
}
function printStarEmpty(){
    $html = file_get_contents("../resources/templates/star_empty.html");
    print $html;
}
function printStarHalf(){
    $html = file_get_contents("../resources/templates/star_half.html");
    print $html;
}
function printCartTop(){
    $html = file_get_contents("../resources/templates/shopping_cart_top.html");
    print $html;
}
function printCartBottom(){
    $html = file_get_contents("../resources/templates/shopping_cart_bottom.html");
    print $html;
}
function printCartRow(){
    $html = file_get_contents("../resources/templates/shopping_cart_product.html");
    print $html;
}
function printDetailTop(){
    $html = file_get_contents("../resources/templates/detail_top.html");
    print $html;
}
function printDetailBottom(){
    $html = file_get_contents("../resources/templates/detail_bottom.html");
    print $html;
}