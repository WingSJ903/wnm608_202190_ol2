<?php
session_start();
include 'header.php';


$confirmationNumber = 'CONF' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: confirmation.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styleguide.css">
    <style>
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }
        .back-button {
            background-color: #778C49;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Thank you for your purchase!</h1>
    <p>Here is your confirmation number: <strong><?php echo $confirmationNumber; ?></strong></p>
    <a href="index.php" class="back-button">Go Back to Home</a>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
