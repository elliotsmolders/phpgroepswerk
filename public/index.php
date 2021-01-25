<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$public_access = true;
require_once '../resources/lib/autoload.php';
printHead('home');
printNav();
?>
<!-- printing out the $msgs -->
<p class="<?php echo removeCart($msgs['removedCart']) ?>" id="removedCart_message"><?php print_r($msgs['removedCart']); ?></p>
<p class="<?php echo addedToCart($msgs['addedToCart']) ?>" id="addedToCart_message"><?php print_r($msgs['addedToCart']); ?></p>
<p class="<?php echo isRegistered($msgs['registered']) ?>" id="register_message"><?php print_r($msgs['registered']); ?></p>
<p class="<?php echo isLoggedOut($msgs['logged_out']) ?>" id="logout_message"><?php print_r($msgs['logged_out']); ?></p>

<?php
printHomeTop();

$sqlorder = '';
// if filter options for order by price/rating has been selected add order by part of sql to $sqlorder
if (isset($_GET['priceRating'])) {
    $string = explode(' ', $_GET['priceRating']);
    $sqlorder = "ORDER BY $string[0] $string[1]";
}
// if category selected, make sql statement that selects all products from that category
if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $sql = 'SELECT * FROM products where pro_category ="';
    $sql .= $category . '"';
    // if brand is also selected, modify sql statement to select products from given category from given brand
    if (isset($_GET['brand'])) {
        $brand = $_GET['brand'];
        $sql .= 'and pro_brand ="';
        $sql .= $brand . '"';
    }
}
// if no category is given but a brand is given, select all products from that brand
elseif (isset($_GET['brand'])) {
    $brand = $_GET['brand'];
    $sql = 'SELECT * FROM products where pro_brand ="';
    $sql .= $brand . '"';
}
// no category or brand filter given => select all products
else {
    $sql = 'SELECT * FROM products ';
}
// add order by statement to our sql (if not given this is just an empty string '')
$sql .= $sqlorder;
// executes the sql, stores fetched data in $data
$data = GetData($sql);
// foreach data element we print out a product card, with fetched data of that element
foreach ($data as $row) {
    printHomeProduct($row['pro_image1'], $row['pro_price'], $row['pro_name'], $row['pro_rating'], $row["pro_unique_id"]);
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

    function hideMessage1() {
        document.getElementById("register_message").style.backgroundColor = 'transparent';
    }

    function closeMessage1() {
        document.getElementById("register_message").style.display = " none";
    }

    function hideMessage2() {
        document.getElementById("logout_message").style.backgroundColor = 'transparent';
    }

    function closeMessage2() {
        document.getElementById("logout_message").style.display = " none";
    }

    function hideMessage3() {
        document.getElementById("removedCart_message").style.backgroundColor = 'transparent';
    }

    function closeMessage3() {
        document.getElementById("removedCart_message").style.display = " none";
    }

    function hideMessage4() {
        document.getElementById("addedToCart_message").style.backgroundColor = 'transparent';
    }

    function closeMessage4() {
        document.getElementById("addedToCart_message").style.display = " none";
    }
    // JS to hide loader on page load
    window.addEventListener("load", function() {
        const loader = document.querySelector(".loader");
        loader.className += " hidden"; // class "loader hidden"
    });
</script>
</body>

</html>