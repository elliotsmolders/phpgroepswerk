<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
$public_access = true;
require_once '../resources/lib/autoload.php';
print_r($msgs);
print_r($_POST);
print_r($_SESSION['cart']);
printHead('home');
printNav();
?>
<!-- printing out the $msgs -->
<p class="<?php echo removeCart($msgs['removedCart'])?>" id="removedCart_message"><?php print_r($msgs['removedCart']) ; ?></p>
<p class="<?php echo addedToCart($msgs['addedToCart'])?>" id="addedToCart_message"><?php print_r($msgs['addedToCart']) ; ?></p>
<p class="<?php echo isRegistered($msgs['registered'])?>" id="register_message"><?php print_r($msgs['registered']) ; ?></p>
<p class="<?php echo isLoggedOut($msgs['logged_out'])?>" id="logout_message"><?php print_r($msgs['logged_out']) ; ?></p>

<?php
printHomeTop();

//get all the data of all products
$data=GetData('SELECT * FROM products');
foreach ( $data as $row )
{

printHomeProduct($row['pro_image1'],$row['pro_price'],$row['pro_name'],$row['pro_rating'],$row["pro_unique_id"]);
}
printHomeBottom();
printFooter();


?>
<script>
    // fade away messages after 3 seconds, delete them after 10
    window.setTimeout("hideMessage1();", 3000);
    window.setTimeout("closeMessage1();", 10000);
    window.setTimeout("hideMessage2();", 3000);
    window.setTimeout("closeMessage2();", 10000);
    window.setTimeout("hideMessage3();", 3000);
    window.setTimeout("closeMessage3();", 10000);
    window.setTimeout("hideMessage4();", 3000);
    window.setTimeout("closeMessage4();", 10000);
    function hideMessage1(){
        document.getElementById("register_message").style.backgroundColor='transparent';
    }

    function closeMessage1(){
        document.getElementById("register_message").style.display=" none";
    }
    function hideMessage2(){
        document.getElementById("logout_message").style.backgroundColor='transparent';
    }

    function closeMessage2(){
        document.getElementById("logout_message").style.display=" none";
    }
    function hideMessage3(){
        document.getElementById("removedCart_message").style.backgroundColor='transparent';
    }

    function closeMessage3(){
        document.getElementById("removedCart_message").style.display=" none";
    }
    function hideMessage4(){
        document.getElementById("addedToCart_message").style.backgroundColor='transparent';
    }

    function closeMessage4(){
        document.getElementById("addedToCart_message").style.display=" none";
    }
</script>
</body>

</html>