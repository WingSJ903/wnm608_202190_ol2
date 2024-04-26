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
            'price' => floatval(preg_replace('/[^0-9\.]/', '', $_POST['price'])), 
            'image' => $_POST['image'],
            'quantity' => $_POST['quantity']
        ];
        addToCart($product);
        header('Location: cart.php');
        exit;
    }
    if (isset($_POST['remove_product_id'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $_POST['remove_product_id']) {
                unset($_SESSION['cart'][$key]);
                header('Location: cart.php');
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styleguide.css">
    <style>
        .parent-container {
            display: flex;
            justify-content: center;
        }
        .main-container {
            display: flex;
        }
        .cart-items-container, .totals-container {
            padding: 20px;
            border: 1px solid #ccc;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .totals-container {
            width: 400px;
        }
        .checkout-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none; 
            display: block; 
            width: 100%; 
            margin-top: 10px;
            padding: 8px 16px; 
            font-size: 14px;
            width: calc(100% - 32px);
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <div class="parent-container">
        <div class="main-container">
            <div class="cart-items-container">
                <h2>Your Cart</h2>
                <?php
                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        echo '<div class="cart-item">';
                        echo '<img src="' . $item['image'] . '" alt="Item Image" class="item-image">';
                        echo '<div class="item-details">';
                        echo '<h3>' . $item['title'] . '</h3>';
                        echo '<p>Price: $' . number_format($item['price'], 2) . '</p>';
                        echo '<p>Quantity: ' . $item['quantity'] . '</p>';
                        echo '<form method="post">';
                        echo '<input type="hidden" name="remove_product_id" value="' . $item['id'] . '">';
                        echo '<button type="submit" class="remove-button" name="remove">Remove</button>';
                        echo '</form>';
                        echo '</div>'; 
                        echo '</div>'; 
                    }
                } else {
                    echo '<p>Your cart is empty.</p>';
                }
                ?>
            </div>

            <div class="totals-container">
                <?php
                $shippingCost = 18.87;

                if (!empty($_SESSION['cart'])) {
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item) {
                        $itemPrice = $item['price'] * $item['quantity'];
                        $total += $itemPrice;
                    }

                    echo '<div class="item-summary">';
                    echo '<p>Item: $' . number_format($total, 2) . '</p>';
                    echo '</div>';

                    echo '<p>Shipping: $' . number_format($shippingCost, 2) . '</p>';
                    echo '<p>Total: $' . number_format($total + $shippingCost, 2) . '</p>';
                }
                ?>
                
                <?php
                if (!empty($_SESSION['cart'])) {
                    echo '<a href="checkout.php" class="checkout-button">Go To Checkout</a>'; 
                }
                ?>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
