<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Info</title>
    <style>
        a {
            color: #40392D; 
            text-decoration: none; 
        }

        a:visited {
            color: #778C49; 
        }

        /* Additional styles for full-width image */
        .hero-container {
            position: relative;
            width: 100%;
            height: 0;
            padding-bottom: 56.25%; /* Aspect ratio: 16:9 */
            overflow: hidden;
        }

        .hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('homepage_01.jpg');
            background-size: cover;
            background-position: center;
            z-index: -1; /* Ensure the image is behind the content */
        }

        .hero-video {
            position: relative;
            width: 100%;
            padding-top: 56.25%; /* Aspect ratio: 16:9 */
            overflow: hidden;
            margin-top: 120px; /* Adjusted margin */
        }

        .hero-video video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-content {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: white;
            z-index: 1; /* Ensure the content is above the image */
            width: 100%;
        }

        .hero-content h1,
        .hero-content h3 {
            margin-top: 20px; /* Add some space between elements */
        }

        .item-container {
            padding-top: 120px; /* Adjusted padding from the hero image */
            text-align: center;
            margin: 0 auto; /* Center the container */
            max-width: 1200px; /* Limit the container width */
            display: flex;
            justify-content: center; /* Center the items horizontally */
        }

        .item {
            flex: 0 0 auto; /* Allow items to shrink if necessary */
            width: 240px; /* Set fixed width for each item */
            margin: 0 40px; /* Adjusted margin */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .item img {
            width: 100%;
            max-height: 240px; /* Set max height for the image */
            object-fit: cover; /* Cover the entire container */
            border-radius: 5px;
        }

        .item h3 {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<!-- Full-width image with content on top -->
<div class="hero-container">
    <div class="hero-image"></div>
    <div class="hero-content">
        <h1>Set the scene</h1>
        <h3 style="font-size: 18pt;">Enjoy that comfy living room feeling outside</h3>
    </div>
</div>

<!-- Items section -->
<div class="item-container">
    <?php
        // Define an array of products
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
            array("id" => 12, "title" => "Zina Ember Black Dining Chair", "price" => "$179", "image" => "Zina Ember Black Dining Chair.jpg")
                    );

        // Shuffle the products array
        shuffle($products);

        // Display only 6 items
        for ($i = 0; $i < min(6, count($products)); $i++) {
            $product = $products[$i];
    ?>
            <div class="item">
                <a href="item.php?id=<?php echo $product['id']; ?>">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>">
                    <h3><?php echo $product['title']; ?></h3>
                </a>
            </div>
    <?php
        }
    ?>
</div>

<!-- Video section -->
<div class="hero-video">
    <video autoplay loop muted>
        <source src="homepage_02.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<?php include 'footer.php'; ?>

</body>
</html>