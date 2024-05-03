<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($_GET['keyword']) ? ucfirst(htmlspecialchars($_GET['keyword'])) . ' - ' : ''; ?>Search Results</title>
    <link rel="stylesheet" href="styleguide.css">
    <style>
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .container {
            width: 30%;
            margin-bottom: 20px;
        }

        .product {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .product-item {
            text-align: center;
        }

        .product-item img {
            width: 100%;
            border-radius: 5px;
        }

        .product-item h2 {
            margin-top: 10px;
            font-size: 18px;
        }

        .product-item p {
            font-size: 16px;
            color: #666;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <div class="product-container">
        <?php
        // Enable error reporting for debugging
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Include or define the $products array
        include 'product_list.php'; // Adjust the filename as necessary

        // Retrieve the keyword from the URL query string
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

        // Debug: Print out the received keyword
        echo "Debug - Keyword: " . htmlspecialchars($keyword) . "<br>";

        // Filter products based on keyword within item titles
        $filteredProducts = array_filter($products, function ($product) use ($keyword) {
            // Convert both title and keyword to lowercase for case-insensitive comparison
            $title = strtolower($product['title']);
            $keyword = strtolower($keyword);
            // Check if the keyword is present in the title
            return strpos($title, $keyword) !== false; // Returns true if $keyword is found in $title
        });

        // Debug: Print out the filtered products array
        echo "<pre>Debug - Filtered Products: "; print_r($filteredProducts); echo "</pre>";

        // Display filtered products
        if (!empty($filteredProducts)) {
            foreach ($filteredProducts as $product) {
                echo '<div class="container">';
                echo '<div class="product">';
                echo '<div class="product-item">';
                echo '<img src="' . $product['image'] . '" alt="' . htmlspecialchars($product['title']) . '">';
                echo '<h2><a href="item.php?id=' . $product['id'] . '">' . htmlspecialchars($product['title']) . '</a></h2>';
                echo '<p>$' . intval(str_replace('$', '', $product['price'])) . '</p>'; 
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            // Display message if no products found
            echo '<p>No products found for "' . htmlspecialchars($keyword) . '".</p>';
        }
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
