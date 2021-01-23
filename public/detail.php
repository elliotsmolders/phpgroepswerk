<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$public_access = true;
require_once '../resources/lib/autoload.php';
$id = $_GET["product"];
$data = GetData("SELECT * FROM products WHERE pro_unique_id = $id");
$price = $data[0]['pro_price'];
$name = $data[0]['pro_name'];
$category = $data[0]['pro_category'];
$brand = $data[0]['pro_brand'];
$rating = $data[0]['pro_rating'];
$description = $data[0]['pro_description'];
$image1 = $data[0]['pro_image1'];
$image2 = $data[0]['pro_image2'];
$image3 = $data[0]['pro_image3'];
$image4 = $data[0]['pro_image4'];
$availability = available($data[0]['pro_availability']);
$id = $data[0]['pro_unique_id'];
printHead("detail");
printNav();
?>
<p class="<?php echo removeCart($msgs['removedCart']) ?>" id="removeCart_message"><?php print_r($msgs['removedCart']); ?></p>
<p class="<?php echo addedToCart($msgs['addedToCart']) ?>" id="addedToCart_message"><?php print_r($msgs['addedToCart']); ?></p>

<?php
printDetailTop($image1, $image2, $image3, $image4, $name, $price, $rating);
printDetailBottom($category, $brand, $description, $availability, $rating, $id, $name);
printFooter();

?>
<!-- js to fade and hide messages after x seconds -->

<script>
    window.setTimeout("hideMessage3();", 2000);
    window.setTimeout("closeMessage3();", 9000);
    window.setTimeout("hideMessage4();", 2000);
    window.setTimeout("closeMessage4();", 9000);

    function closeMessage2() {
        document.getElementById("logout_message").style.display = " none";
    }

    function hideMessage3() {
        document.getElementById("removeCart_message").style.backgroundColor = 'transparent';
    }

    function closeMessage3() {
        document.getElementById("removeCart_message").style.display = " none";
    }

    function hideMessage4() {
        document.getElementById("addedToCart_message").style.backgroundColor = 'transparent';
    }

    function closeMessage4() {
        document.getElementById("addedToCart_message").style.display = " none";
    }
</script>
<!-- js to hide loader on page load -->

<script>
    window.addEventListener("load", function() {
        const loader = document.querySelector(".loader");
        loader.className += " hidden"; // class "loader hidden"
    });
</script>
</body>

</html>