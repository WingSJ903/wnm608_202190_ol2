<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Page</title>
    <link rel="stylesheet" href="styleguide.css">
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <div class="main-container">
        <div class="container">
            <?php

            $product_id = $_GET['id'];

            $products = array(
                array("id" => 1, "title" => "Lubek Slate Gray Low Loveseat", "price" => "$849", "image" => "Lubek Slate Gray Low Loveseat.jpg"),
                array("id" => 2, "title" => "Aubyn 32 Coffee Table", "price" => "$299", "image" => "Aubyn 32 Coffee Table.jpg"),
                array("id" => 3, "title" => "Bix by Sea Black Side Table", "price" => "$199", "image" => "BixbySeaBlackSideTable.jpg"),
                array("id" => 4, "title" => "Callais Taupe Gray Sofa", "price" => "$1599", "image" => "Callais Taupe Gray Sofa.jpg"),
                array("id" => 5, "title" => "Lubek Tuscan Brown Dining Set", "price" => "$1798", "image" => "Lubek Tuscan Brown Dining Set.jpg"),
                array("id" => 6, "title" => "Lubek Slate Gray Low Corner Sectional Set", "price" => "$2474", "image" => "LubekSlateGrayLowCornerSectionalSet.jpg"),
                array("id" => 7, "title" => "Medan Graphite Lounge Chair", "price" => "$449", "image" => "Medan Graphite Lounge Chair.jpg"),
                array("id" => 8, "title" => "Ofer Dark Gray Table Extendable", "price" => "$1099", "image" => "OferDarkGrayTableExtendable.jpg"),
                array("id" => 9, "title" => "Sarek Khaki Green Dining Table For 6", "price" => "$649", "image" => "Sarek Khaki Green Dining Table For 6.jpg"),
                array("id" => 10, "title" => "Sarek Khaki Green Stackable Dining Chair", "price" => "$149", "image" => "Sarek Khaki Green Stackable Dining Chair.jpg"),
                array("id" => 11, "title" => "Skane Green Coffee Table", "price" => "$499", "image" => "Skane Green Coffee Table.jpg"),
                array("id" => 12, "title" => "Zina Ember Black Dining Chair", "price" => "$179", "image" => "Zina Ember Black Dining Chair.jpg"),
            );

            $product = null;
            foreach ($products as $p) {
                if ($p['id'] == $product_id) {
                    $product = $p;
                    break;
                }
            }

            if ($product) {
                echo '<img src="' . $product['image'] . '" alt="Item Image" class="item-image">';
                echo '<h2>' . $product['title'] . '</h2>';
                echo '<p>Price: ' . $product['price'] . '</p>';
                echo '<form method="post" action="cart.php">';
                echo '<input type="hidden" name="id" value="' . $product['id'] . '">';
                echo '<input type="hidden" name="title" value="' . $product['title'] . '">';
                echo '<input type="hidden" name="price" value="' . $product['price'] . '">';
                echo '<input type="hidden" name="image" value="' . $product['image'] . '">';
                echo '<input type="hidden" name="quantity" value="1">';
                echo '<button type="submit" class="add-to-cart">Add to Cart</button>';
                echo '</form>';
                echo '<p>Delivery to San Jose: Apr 15th - 22nd</p>';
                echo '<p>In stock and ready to ship</p>';
                echo '<p>30 day satisfaction guarantee</p>';
            } else {
                echo '<p>Product not found</p>';
            }
            ?>

            <!-- New Items Section -->
            <div class="new-items">
                <h2>New Items</h2>
                <div class="new-items-container">
                    <?php
                    $random_products = array_rand($products, 8);

                    foreach ($random_products as $random_index) {
                        echo '<div class="new-item">';
                        echo '<a href="item.php?id=' . $products[$random_index]['id'] . '">';
                        echo '<img src="' . $products[$random_index]['image'] . '" alt="Item Image">';
                        echo '<h3>' . $products[$random_index]['title'] . '</h3>';
                        echo '<p>Price: ' . $products[$random_index]['price'] . '</p>';
                        echo '</a>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>