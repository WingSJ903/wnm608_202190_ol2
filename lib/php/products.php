<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="styleguide.css">
    <style>
        a {
            color: #40392D; 
            text-decoration: none; 
        }

        a:visited {
            color: #778C49;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <div class="product-container">
        <?php

        $products = array(
            array("id" => 1, "title" => "Lubek Slate Gray Low Loveseat", "price" => "$849", "image" => "Lubek Slate Gray Low Loveseat.jpg"),
            array("id" => 2, "title" => "Aubyn 32 Coffee Table", "price" => "$299", "image" => "Aubyn 32 Coffee Table.jpg"),
            array("id" => 3, "title" => "Bix by Sea Black Side Table", "price" => "$199", "image" => "BixbySeaBlackSideTable.jpg"),
            array("id" => 4, "title" => "Callais Taupe Gray Sofa", "price" => "$1599", "image" => "Callais Taupe Gray Sofa.jpg"),
            array("id" => 5, "title" => "Lubek Tuscan Brown Dining Set ", "price" => "$1798", "image" => "Lubek Tuscan Brown Dining Set.jpg"),
            array("id" => 6, "title" => "Lubek Slate Gray Low Corner Sectional Set", "price" => "$2474", "image" => "LubekSlateGrayLowCornerSectionalSet.jpg"),
            array("id" => 7, "title" => "Medan Graphite Lounge Chair", "price" => "$449", "image" => "Medan Graphite Lounge Chair.jpg"),
            array("id" => 8, "title" => "Ofer Dark Gray Table Extendable", "price" => "$1099", "image" => "OferDarkGrayTableExtendable.jpg"),
            array("id" => 9, "title" => "Sarek Khaki Green Dining Table For 6", "price" => "$649", "image" => "Sarek Khaki Green Dining Table For 6.jpg"),
            array("id" => 10, "title" => "Sarek Khaki Green Stackable Dining Chair", "price" => "$149", "image" => "Sarek Khaki Green Stackable Dining Chair.jpg"),
            array("id" => 11, "title" => "Skane Green Coffee Table", "price" => "$499", "image" => "Skane Green Coffee Table.jpg"),
            array("id" => 12, "title" => "Zina Ember Black Dining Chair", "price" => "$179", "image" => "Zina Ember Black Dining Chair.jpg")
        );

        $totalProducts = count($products);
        $productsPerRow = 3;
        $rows = ceil($totalProducts / $productsPerRow);
        for ($i = 0; $i < $rows; $i++) {
            echo '<div class="row">';
            for ($j = 0; $j < $productsPerRow; $j++) {
                $index = $i * $productsPerRow + $j;
                if ($index < $totalProducts) {
                    $product = $products[$index];
                    echo '<div class="container">';
                    echo '<div class="product">';
                    echo '<div class="product-item">';
                    echo '<img src="' . $product['image'] . '" alt="' . $product['title'] . '">';
                    echo '<h2><a href="item.php?id=' . $product['id'] . '">' . $product['title'] . '</a></h2>';
                    echo '<p>$' . intval(str_replace('$', '', $product['price'])) . '</p>'; 
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            echo '</div>';
        }
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
