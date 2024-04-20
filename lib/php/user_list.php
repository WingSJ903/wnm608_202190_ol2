<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
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
            max-width: 1200px;
        }

        .user-list {
            margin-top: 20px;
            padding: 0;
            list-style-type: none;
        }

        .user-list li {
            margin-bottom: 10px;
        }

        .user-list li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .user-list li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <h1>User List</h1>
</header>

<div class="container"> <!-- Added the container class here -->
    <ul class="user-list">
        <?php
        // Load user data from JSON file
        $users = json_decode(file_get_contents('users.json'), true);

        // Display user list
        foreach ($users as $user) {
            echo '<li><a href="edit_user.php?id=' . $user['id'] . '">' . $user['name'] . '</a></li>';
        }
        ?>
    </ul>
</div>

</body>
</html>
