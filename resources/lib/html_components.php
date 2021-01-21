<?php
//prints header with bodyclass as argument
function printHead($class = "")
{
    $header = file_get_contents("../resources/templates/header.html");
    $header = str_replace("@BODYCLASS@", $class, $header);
    print $header;
}
//prints navbar.html
function printNav()
{
    $html = file_get_contents("../resources/templates/navbar.html");
    if(isset($_SESSION['user'])){
        $html = file_get_contents("../resources/templates/navbar.html");
        $html = str_replace('hidden @HIDDEN@', 'show',$html);
        $html = str_replace("@LOGGEDOUT@",'hidden',$html);
        $html = str_replace('@USERNAME@',$_SESSION['user']['kla_username'],$html);
       print $html;
    }
    else{
        print $html;
    }
}



//prints footer.html
function printFooter()
{
    $footer = file_get_contents("../resources/templates/footer.html");
    print $footer;
}
//prints home_top.html (top half untill where we can add products
function printHomeTop()
{
    $html = file_get_contents("../resources/templates/home_top.html");
    print $html;
}
//prints home_bottom.html (from where products end)
function printHomeBottom()
{
    $html = file_get_contents("../resources/templates/home_bottom.html");
    print $html;
}
// product items
function printHomeProduct()
{
    $productHtml = file_get_contents("../resources/templates/product_home.html");
    print $productHtml;
}
//prints a full star
function printStarFull()
{
    $html = file_get_contents("../resources/templates/star_full.html");
    print $html;
}
//prints an empty star
function printStarEmpty()
{
    $html = file_get_contents("../resources/templates/star_empty.html");
    print $html;
}
//prints a half star
function printStarHalf()
{
    $html = file_get_contents("../resources/templates/star_half.html");
    print $html;
}
//prints top half of shopping cart (untill where we can add our product rows)
function printCartTop()
{
    $html = file_get_contents("../resources/templates/shopping_cart_top.html");
    print $html;
}
// bottom half of shopping cart (starts after the last row)
function printCartBottom()
{
    $html = file_get_contents("../resources/templates/shopping_cart_bottom.html");
    print $html;
}
// product rows for shopping_cart.html
function printCartRow()
{
    $html = file_get_contents("../resources/templates/shopping_cart_product.html");
    print $html;
}
//prints top half of detail.html till where we add our rating
function printDetailTop()
{
    $html = file_get_contents("../resources/templates/detail_top.html");
    print $html;
}
//prints bottom half of detail.html from after the rating
function printDetailBottom()
{
    $html = file_get_contents("../resources/templates/detail_bottom.html");
    print $html;
}
// checks if $msgs['registered] exists
function isRegistered($x)
{return $x ? 'registered' : 'hidden';
}

/*
function printRegistrationInput($type,$placeholder,$id,$name,$value){
    $html = file_get_contents("../resources/templates/registration_form_input.html");
    $html = str_replace("@TYPE@", $type, $html);
    $html = str_replace("@NAME@", $type, $html);
    $html = str_replace("@ID@", $type, $html);
    $html = str_replace("@PLACEHOLDER@", $type, $html);
    $html = str_replace("@VALUE@", $type, $html);



}*/
