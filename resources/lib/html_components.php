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
    if(isset($_SESSION['cart']) && count($_SESSION['cart'])!=0){
        $html = str_replace('@SHOPPINGCARTNUMBER@',count($_SESSION['cart']),$html);
    }
    else{
        $html = str_replace('@SHOPPINGCARTNONUMBER@','hidden',$html);
    }
    if(isset($_SESSION['user'])){
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
// product items (need to add brand+category)
function printHomeProduct($image,$price,$name,$rating,$id)
{
    $productHtml = file_get_contents("../resources/templates/product_home.html");
    $productHtml =str_replace("@PRODUCTNAME@",$name,$productHtml);
    $productHtml =str_replace("@PRICE@",$price,$productHtml);
    $productHtml =str_replace("@IMAGE@",$image,$productHtml);
    $productHtml =str_replace("@PRODUCTID@",$id,$productHtml);
    print $productHtml;

    $fullstars=floor($rating);
    $halfstars=ceil($rating-$fullstars);
    $emptystars=5-$fullstars-$halfstars;
    $starhtml=printStarFull($fullstars).printStarHalf($halfstars).printStarEmpty($emptystars);
    print $starhtml;
    print file_get_contents("../resources/templates/stars.html");

}
//prints a full star
function printStarFull($x)
{
    $html = file_get_contents("../resources/templates/star_full.html");
    print str_repeat($html,$x);
}
//prints an empty star
function printStarEmpty($x)
{
    $html = file_get_contents("../resources/templates/star_empty.html");
    print str_repeat($html,$x);
}
//prints a half star
function printStarHalf($x)
{
    $html = file_get_contents("../resources/templates/star_half.html");
    print str_repeat($html,$x);
}
//prints top half of shopping cart (untill where we can add our product rows)
function printCartTop()
{
    $html = file_get_contents("../resources/templates/shopping_cart_top.html");
    $html = str_replace("@USERNAME@",$_SESSION["user"]["kla_username"],$html);
    print $html;
}
// bottom half of shopping cart (starts after the last row)
function printCartBottom()
{
    $html = file_get_contents("../resources/templates/shopping_cart_bottom.html");
    print $html;
}
// product rows for shopping_cart.html
function printCartRow($price,$image,$name,$quantity,$id)
{
    $html = file_get_contents("../resources/templates/shopping_cart_product.html");
    $html = str_replace("@PRICE@",$price,$html);
    $html = str_replace("@PRODUCTIMAGE@",$image,$html);
    $html = str_replace("@PRODUCTNAME@",$name,$html);
    $html = str_replace("@PRODUCTID@",$id,$html);
    $html = str_replace("@QUANTITY@",$quantity,$html);
    $html = str_replace("@TOTAL@",$quantity*$price,$html);

    print $html;
}
//prints top half of detail.html till where we add our rating
function printDetailTop($image1,$image2,$image3,$image4,$name,$price,$rating)
{
    $html = file_get_contents("../resources/templates/detail_top.html");
    $html = str_replace("@IMAGE1@",$image1,$html);
    $html = str_replace("@IMAGE2@",$image2,$html);
    $html = str_replace("@IMAGE3@",$image3,$html);
    $html = str_replace("@IMAGE4@",$image4,$html);
    $html = str_replace("@NAME@",$name,$html);
    $html = str_replace("@PRICE@",$price,$html);
    print $html;
    $fullstars=floor($rating);
    $halfstars=ceil($rating-$fullstars);
    $emptystars=5-$fullstars-$halfstars;
    $starhtml=printStarFull($fullstars).printStarHalf($halfstars).printStarEmpty($emptystars);
    print $starhtml;
}
function available($x){
    return $x == "Y" ? 'in stock' : 'not in stock';
}
function roundIfInt($x){
    return floor($x) == $x ? floor($x): round($x,1);
}
//prints bottom half of detail.html from after the rating
function printDetailBottom($category,$brand,$description,$availability,$rating,$id)
{
    $html = file_get_contents("../resources/templates/detail_bottom.html");
    $html = str_replace("@DESCRIPTION@",$description,$html);
    $html = str_replace("@RATING@",roundIfInt($rating),$html);
    $html = str_replace("@BRAND@",$brand,$html);
    $html = str_replace("@CATEGORY@",$category,$html);
    $html = str_replace("@AVAILABILITY@",$availability,$html);
    $html = str_replace("@PRODUCTID@",$id,$html);
    print $html;
}
// checks if $msgs['registered] exists
function isRegistered($x)
{return $x ? 'registered' : 'hidden';
}
function isLoggedOut($x){
    return $x ? 'logoutmessage' : 'hidden';
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
