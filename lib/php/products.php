<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="styleguide.css">

    <style>

 a {
            color: #40392D; 
            text-decoration: none; 
        }

        a:visited {
            color: #778C49; 
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #778C49;
            color: white;
            padding: 20px;
        }


        main {
            padding: 20px;
        }


        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .search-bar form {
            width: 90%;
            display: flex;
            align-items: center;
        }

        .search-bar input[type="text"] {
            flex-grow: 1;
            height: 40px;
            border-radius: 20px;
            border: 2px solid #778C49;
            padding: 0 20px;
            font-size: 18px;
            margin-right: 10px;
        }

        .search-bar button {
            height: 40px;
            border-radius: 20px;
            background-color: #778C49;
            color: white;
            border: none;
            padding: 0 20px;
            font-size: 18px;
            cursor: pointer;
        }


        .quick-filters {
            display: flex;
            align-items: center;
            margin: 0 auto;
            width: 90%;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .quick-filters button {
            width: 100px;
            height: 40px;
            background-color: #778C49;
            color: white;
            border: none;
            border-radius: 20px;
            margin-right: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .sort-by {
            margin-left: 10px;
        }

        .sort-by select {
            width: 150px;
            height: 40px;
            background-color: white;
            color: #778C49;
            border: 2px solid #778C49;
            border-radius: 20px;
            padding: 0 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .container {
            flex: 0 1 calc(33.33% - 20px);
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            box-sizing: border-box;
            min-width: 180px;
        }

        .product-item img {
            width: 100%;
            height: auto;
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

    <div class="search-bar">
        <form action="products.php" method="GET">
            <input type="text" name="keyword" placeholder="Search products..." aria-label="Search products">
            <button type="submit">Search</button>
        </form>
    </div>


    <div class="quick-filters">
        <button onclick="filterByCategory('All')">All</button>
        <button onclick="filterByCategory('Table')">Table</button>
        <button onclick="filterByCategory('Chair')">Chair</button>
        <button onclick="filterByCategory('Set')">Set</button>
        <button onclick="filterByCategory('Seat')">Seat</button>
        <button onclick="filterByCategory('Sofa')">Sofa</button>


        <div class="sort-by">
            <select id="sort" name="sort_by" onchange="sortProducts()">
                <option value="popularity">Popularity</option>
                <option value="price_high_low">Price: High to Low</option>
                <option value="price_low_high">Price: Low to High</option>
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
            </select>
        </div>
    </div>

    <div class="product-container">
        <?php
        $products = array(
            array("id" => 1, "title" => "Lubek Slate Gray Low Loveseat", "price" => 849, "image" => "Lubek Slate Gray Low Loveseat.jpg", "date_added" => "2024-04-25"),
            array("id" => 2, "title" => "Aubyn 32 Coffee Table", "price" => 299, "image" => "Aubyn 32 Coffee Table.jpg", "date_added" => "2024-04-23"),
            array("id" => 3, "title" => "Bix by Sea Black Side Table", "price" => 199, "image" => "BixbySeaBlackSideTable.jpg", "date_added" => "2024-04-22"),
            array("id" => 4, "title" => "Callais Taupe Gray Sofa", "price" => 1599, "image" => "Callais Taupe Gray Sofa.jpg", "date_added" => "2024-04-21"),
            array("id" => 5, "title" => "Lubek Tuscan Brown Dining Set ", "price" => 1798, "image" => "Lubek Tuscan Brown Dining Set.jpg", "date_added" => "2024-04-20"),
            array("id" => 6, "title" => "Lubek Slate Gray Low Corner Sectional Set", "price" => 2474, "image" => "LubekSlateGrayLowCornerSectionalSet.jpg", "date_added" => "2024-04-19"),

            array("id" => 7, "title" => "Medan Graphite Lounge Chair", "price" => 449, "image" => "Medan Graphite Lounge Chair.jpg", "date_added" => "2024-04-18"),
            array("id" => 8, "title" => "Ofer Dark Gray Table Extendable", "price" => 1099, "image" => "OferDarkGrayTableExtendable.jpg", "date_added" => "2024-04-17"),
            array("id" => 9, "title" => "Sarek Khaki Green Dining Table For 6", "price" => 649, "image" => "Sarek Khaki Green Dining Table For 6.jpg", "date_added" => "2024-04-16"),
            array("id" => 10, "title" => "Sarek Khaki Green Stackable Dining Chair", "price" => 149, "image" => "Sarek Khaki Green Stackable Dining Chair.jpg", "date_added" => "2024-04-15"),
            array("id" => 11, "title" => "Skane Green Coffee Table", "price" => 499, "image" => "Skane Green Coffee Table.jpg", "date_added" => "2024-04-14"),
            array("id" => 12, "title" => "Zina Ember Black Dining Chair", "price" => 179, "image" => "Zina Ember Black Dining Chair.jpg", "date_added" => "2024-04-13")
        );


        $filteredProducts = $products;

        // Filter products by keyword
        if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $keyword = strtolower($_GET['keyword']);
            $filteredProducts = array_filter($filteredProducts, function($product) use ($keyword) {
                return strpos(strtolower($product['title']), $keyword) !== false;
            });
        }

        // Filter products by category
        if (isset($_GET['category']) && $_GET['category'] !== 'All') {
            $category = $_GET['category'];
            $filteredProducts = array_filter($filteredProducts, function($product) use ($category) {
                return strpos(strtolower($product['title']), strtolower($category)) !== false;
            });
        }

        // Sort products
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            switch ($sort_by) {
                case 'popularity':
                    shuffle($filteredProducts);
                    $filteredProducts = array_slice($filteredProducts, 0, 7);
                    break;
                case 'price_high_low':
                    usort($filteredProducts, function($a, $b) {
                        return $b['price'] - $a['price'];
                    });
                    break;
                case 'price_low_high':
                    usort($filteredProducts, function($a, $b) {
                        return $a['price'] - $b['price'];
                    });
                    break;
                case 'newest':
                    usort($filteredProducts, function($a, $b) {
                        return strtotime($b['date_added']) - strtotime($a['date_added']);
                    });
                    break;
                case 'oldest':
                    usort($filteredProducts, function($a, $b) {
                        return strtotime($a['date_added']) - strtotime($b['date_added']);
                    });
                    break;
            }
        }

        // Display filtered and sorted products
        foreach ($filteredProducts as $product) {
            echo '<div class="container">';
            echo '<div class="product">';
            echo '<div class="product-item">';
            echo '<img src="' . $product['image'] . '" alt="' . $product['title'] . '">';
            echo '<h2><a href="item.php?id=' . $product['id'] . '">' . $product['title'] . '</a></h2>';
            echo '<p>$' . $product['price'] . '</p>'; 
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>

<script>

    function filterByCategory(category) {
        window.location.href = 'products.php?category=' + category;
    }


    function sortProducts() {
        var sortSelect = document.getElementById("sort");
        var selectedSort = sortSelect.options[sortSelect.selectedIndex].value;
        window.location.href = 'products.php?sort_by=' + selectedSort;
    }


    window.onload = function() {
        var sortSelect = document.getElementById("sort");
        var selectedSort = "<?php echo isset($_GET['sort_by']) ? $_GET['sort_by'] : 'popularity'; ?>";
        for (var i = 0; i < sortSelect.options.length; i++) {
            if (sortSelect.options[i].value === selectedSort) {
                sortSelect.selectedIndex = i;
                break;
            }
        }
    };
</script>

</body>
</html>