<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Page</title>
    <link rel="stylesheet" href="styleguide.css">
    <style>
        a {
            color: #40392D; 
            text-decoration: none; 
        }

        a:visited {
            color: #778C49; 
        }

        .item-container {
            text-align: center;
            margin: auto;
        }

        .item-image {
            max-width: 50%;
            max-height: 50%; 
            padding: 24px; 
            display: block; 
            margin: auto; 
        }

        .item-details {
            margin-top: 20px;
            text-align: center;
        }

        .new-items {
            margin-top: 320px;
            height: calc(100% + 80px); /* Increase height by 80px */
        }

        .new-items-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
        }

        .new-item {
            text-align: center;
        }

        .banner {
            display: none;
            background-color: #BDBF6F;
            width: 100%;
            text-align: center;
            color: white;
            position: absolute;
            top: 120px; 
            left: 0;
            z-index: 999;
            padding: 80px 0;
        }

        .banner p {
            margin-top: 20px;
            font-size: 24px;
        }

        .banner button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: white;
            color: #40392D; 
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
            margin-left: 10px; 
            border-radius: 24px; 
        }

        .banner button:hover {
            background-color: #f0f0f0;
            color: black;
        }

        /* Custom Add to Cart button style */
        .add-to-cart-button {
            display: block; /* Display as block to move below the price */
            margin-top: 20px; /* Adjust top margin */
            margin-bottom: 20px; /* Add bottom margin */
            padding: 10px 20px;
            background-color: #40392D;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 24px;
            transition: background-color 0.3s, color 0.3s;
            margin: auto; /* Center horizontally */
        }

        .add-to-cart-button:hover {
            background-color: #574e3e;
        }

        .item-info {
            margin-top: 20px; /* Adjust margin top */
            margin-bottom: 20px; /* Adjust margin bottom */
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <div class="main-container" style="height: calc(100% + 200px);"> <!-- Increase height by 200px -->
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
                echo '<div class="item-container">';
                echo '<img src="' . $product['image'] . '" alt="Item Image" class="item-image">';
                echo '<div class="item-details">';
                echo '<h2 class="item-info">' . $product['title'] . '</h2>';
                echo '<p class="item-info">Price: ' . $product['price'] . '</p>';

                // Form for adding the item to the cart
                echo '<form id="add-to-cart-form" action="cart.php" method="post">';
echo '<input type="hidden" name="id" value="' . $product['id'] . '">';
echo '<input type="hidden" name="title" value="' . $product['title'] . '">';
echo '<input type="hidden" name="price" value="' . $product['price'] . '">';
echo '<input type="hidden" name="image" value="' . $product['image'] . '">';
echo '<label for="quantity" class="item-info">Quantity:</label>';
echo '<select name="quantity" class="item-info">';
for ($i = 1; $i <= 10; $i++) {
    echo '<option value="' . $i . '">' . $i . '</option>';
}
echo '</select>';
// Add to Cart button
echo '<button type="button" class="add-to-cart add-to-cart-button item-info" onclick="addToCart()">Add to Cart</button>';
echo '</form>';


                echo '<p class="item-info">Delivery to San Jose: Apr 15th - 22nd</p>';
                echo '<p class="item-info">In stock and ready to ship</p>';
                echo '<p class="item-info">30 day satisfaction guarantee</p>';
                echo '</div>'; // Close item-details
                echo '</div>'; // Close item-container
            } else {
                echo '<p>Product not found</p>';
            }
            ?>

            <div class="new-items">
                <h2>New Items</h2>
                <div class="new-items-container">
                    <?php
                    $random_products = array_rand($products, 4); 

                    foreach ($random_products as $random_index) {
                        echo '<div class="new-item">';
                        echo '<a href="item.php?id=' . $products[$random_index]['id'] . '">';
                        echo '<img src="' . $products[$random_index]['image'] . '" alt="Item Image">';
                        echo '<h3>' . $products[$random_index]['title'] . '</h3>';
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

<script>
    document.querySelector('.add-to-cart').addEventListener('click', function() {
        var formData = new FormData(document.getElementById('add-to-cart-form'));
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'cart.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById('banner').style.display = 'block';
            }
        };
        xhr.send(formData);
    });

    function continueShopping() {
        window.location.href = 'products.php';
    }

    function goToCart() {
        window.location.href = 'cart.php';
    }
</script>




<!-- Banner element -->
<div id="banner" class="banner" style="display: none;">
    <p>Item added to cart successfully!</p>
    <button onclick="continueShopping()">Continue Shopping</button>
    <button onclick="goToCart()">Go to Cart</button>
</div>

<?php include 'footer.php'; ?>
