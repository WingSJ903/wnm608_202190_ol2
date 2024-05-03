<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="styleguide.css">
    <style>
        header {
            background-color: #778C49;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24pt;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            margin-right: 20px;
            color: white;
            font-size: 16pt;
            text-decoration: none;
        }


    </style>
</head>
<body>

<header>
    <div style="display: flex; justify-content: space-between; align-items: center; padding-left: 80px; padding-right: 80px;">
        <h1><a href="index.php" style="color: white; text-decoration: none;">EdenGrove</a></h1>
        <nav>
            <a href="products.php" style="color: white; text-decoration: none; font-size: 16pt; margin-right: 20px;">Products</a>
            <a href="cart.php" style="color: white; text-decoration: none; font-size: 16pt; margin-right: 20px;">Cart</a>
            <a href="user_list.php" style="color: white; text-decoration: none; font-size: 16pt; margin-right: 20px;">Admin</a>
        </nav>
    </div>
</header>

</body>
</html>
