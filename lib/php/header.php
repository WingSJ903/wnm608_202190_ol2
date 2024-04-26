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

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-input {
            width: 360px;
            height: 32px;
            padding: 10px;
            font-size: 16pt;
            border: 2px solid #ccc;
            border-radius: 24px;
        }
    </style>
</head>
<body>

<header>
    <div style="display: flex; justify-content: space-between; align-items: center; padding-left: 80px; padding-right: 80px;">
        <h1 style="font-size: 24pt;"><a href="index.php" style="color: white; text-decoration: none;">EdenGrove</a></h1>
        <nav>
            <div class="search-bar" style="margin-right: 48px;">
                <input type="text" class="search-input" placeholder="Search...">
            </div>
            <a href="products.php" style="margin-right: 20px; color: white; font-size: 16pt;">Products</a>
            <a href="cart.php" style="margin-right: 20px; color: white; font-size: 16pt;">Cart</a>
            <a href="user_list.php" style="margin-right: 20px; color: white; font-size: 16pt;">Admin</a>
        </nav>
    </div>
</header>

</body>
</html>
