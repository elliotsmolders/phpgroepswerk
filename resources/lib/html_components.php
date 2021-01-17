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