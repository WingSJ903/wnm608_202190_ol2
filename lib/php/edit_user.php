<?php
$users = json_decode(file_get_contents('users.json'), true);

$id = $_GET['id'] ?? null;

$current_user = null;
foreach ($users as $user) {
    if ($user['id'] == $id) {
        $current_user = $user;
        break;
    }
}

if ($current_user === null) {
    die('User not found.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $shipping_address = $_POST['shipping_address'];

    foreach ($users as &$user) {
        if ($user['id'] == $id) {
            $user['name'] = $name;
            $user['phone'] = $phone;
            $user['email'] = $email;
            $user['shipping_address'] = $shipping_address;
            break;
        }
    }

    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    header('Location: user_list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }

        header {
            background-color: #778C49;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px; /* Adjusted max-width for form */
        }

        form {
            margin-top: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form button {
            background-color: #778C49;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        form button:hover {
            background-color: #6a7842;
        }
    </style>
</head>
<body>

<header>
    <h1>Edit User</h1>
</header>

<div class="container"> 
    <form method="POST">
        <input type="hidden" name="id" value="<?= $current_user['id'] ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $current_user['name'] ?>"><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?= $current_user['phone'] ?>"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $current_user['email'] ?>"><br>
        <label for="shipping_address">Shipping Address:</label>
        <input type="text" id="shipping_address" name="shipping_address" value="<?= $current_user['shipping_address'] ?>"><br>
        <button type="submit">Update</button>
    </form>
    <form action="user_list.php">
        <button type="submit" style="background-color: #4B9EBF; color: #ffffff; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px;">Back to User List</button>
    </form>
</div>

</body>
</html>
