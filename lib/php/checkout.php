<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styleguide.css">
    <style>
        /* Your CSS styles here */
        .parent-container {
            display: flex;
            justify-content: center;
        }
        .main-container {
            display: flex;
            justify-content: space-between; 
            padding: 0 80px; 
            width: 100%; 
        }
        .left-container, .right-container {
            padding: 24px;
            border: 1px solid #ccc;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .left-container {
            flex-grow: 1; 
            max-width: calc(50% - 45px); 
        }
        .right-container {
            flex-grow: 0; 
            width: 480px; 
        }
        .checkout-button, .confirm-pay-button {
            background-color: #778C49; 
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
            min-width: 300px;
        }
        .form-group {
            margin-bottom: 20px;
            display: flex; 
            flex-wrap: wrap; 
        }
        .form-group input, .form-group select {
            flex: 1 1 48%; 
            height: 48px;
            padding: 10px;
            border: 1px solid #000;
            border-radius: 4px;
            margin-bottom: 10px;
            margin-right: 10px; 
        }
        .form-group input:last-child, .form-group select:last-child {
            margin-right: 0; 
        }
        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .cart-item img {
            width: 160px; 
            height: 160px; 
            margin-right: 20px;
        }
        .item-details {
            width: calc(80% - 160px); 
            padding-right: 80px; 
        }
        .item-details h3 {
            margin: 0;
        }
        .item-details p {
            margin: 5px 0;
        }
        .divider {
            margin: 24px 0;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
<?php
session_start();
include 'header.php';
?>

<main>
    <div class="parent-container">
        <div class="main-container">
            <!-- Left container -->
            <div class="left-container">
                <form action="confirmation.php" method="post">
                    <!-- Payment Information -->
                    <h2>Pay with</h2>
                    <div class="form-group">
                        <input type="text" id="card_number" name="card_number" placeholder="Credit Card Number" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="exp_date" name="exp_date" placeholder="Expiration Date (MM/YYYY)" required>
                        <input type="text" id="security_code" name="security_code" placeholder="Security Code" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                    <!-- Shipping Information -->
                    <h2>Ship to</h2>
                    <div class="form-group">
                        <input type="text" id="address1" name="address1" placeholder="Street Address" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="city" name="city" placeholder="City" required>
                        <input type="text" id="zip" name="zip" placeholder="Zip Code" required>
                    </div>
                    <!-- Cart Items -->
                    <h2>Items</h2>
                    <?php
                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) {
                            echo '<div class="cart-item">';
                            echo '<img src="' . htmlspecialchars($item['image']) . '" alt="' . htmlspecialchars($item['title']) . '">';
                            echo '<div class="item-details">';
                            echo '<h3>' . htmlspecialchars($item['title']) . '</h3>';
                            echo '<p>Price: $' . number_format($item['price'], 2) . '</p>';
                            echo '<p>Quantity: ' . (int)$item['quantity'] . '</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Your cart is empty.</p>';
                    }
                    ?>
                </form>
            </div>
<!-- Right container -->
<div class="right-container">
    <!-- Order summary content -->
    <h2>Order Summary</h2>
    <?php
    $shippingCost = 15.00; 
    if (!empty($_SESSION['cart'])) {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $taxRate = 0.08; 
        $taxAmount = $total * $taxRate;
        $grandTotal = $total + $shippingCost + $taxAmount;

        echo '<p>Price: $' . number_format($total, 2) . '</p>';
        echo '<p>Shipping: $' . number_format($shippingCost, 2) . '</p>';
        echo '<p>Tax: $' . number_format($taxAmount, 2) . '</p>';
        echo '<div class="divider"></div>';
        echo '<p>Total: $' . number_format($grandTotal, 2) . '</p>';
    }
    ?>
    <!-- Confirm and Pay button -->
    <form action="confirmation.php" method="post">
        <button type="submit" name="confirm_payment" class="confirm-pay-button">Confirm and Pay</button>
    </form>
</div>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
</body>
</html>
