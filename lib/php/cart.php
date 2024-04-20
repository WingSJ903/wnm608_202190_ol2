<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styleguide.css">
</head>
<body>

<?php include 'header.php'; ?>
<main>
    <div class="main-container">
        <div class="container">
            <h2>Your Cart</h2>
            <?php
            session_start();

            function addToCart($product) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }
                $found = false;
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['id'] == $product['id']) {
                        $item['quantity'] += $product['quantity'];
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $_SESSION['cart'][] = $product;
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['id'])) {
                    $product = [
                        'id' => $_POST['id'],
                        'title' => $_POST['title'],
                        'price' => $_POST['price'],
                        'image' => $_POST['image'],
                        'quantity' => $_POST['quantity']
                    ];
                    addToCart($product);
                    header('Location: cart.php');
                    exit;
                }
            }

            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    echo '<div class="cart-item">';
                    echo '<img src="' . $item['image'] . '" alt="Item Image" class="item-image">';
                    echo '<div class="item-details">';
                    echo '<h3>' . $item['title'] . '</h3>';
                    echo '<p>Price: ' . $item['price'] . '</p>';
                    echo '<form method="post">';
                    echo '<label for="quantity">Quantity:</label>';
                    echo '<select id="quantity" name="quantity" onchange="this.form.submit()">';
                    for ($i = 1; $i <= 99; $i++) {
                        echo '<option value="' . $i . '"' . ($i == $item['quantity'] ? ' selected' : '') . '>' . $i . '</option>';
                    }
                    echo '</select>';
                    echo '<input type="hidden" name="product_id" value="' . $item['id'] . '">';
                    echo '</form>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="remove_product_id" value="' . $item['id'] . '">';
                    echo '<button type="submit" name="remove">Remove</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Your cart is empty.</p>';
            }
            ?>
            <button class="checkout-button">Checkout</button>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
