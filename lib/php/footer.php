<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="styleguide.css">
    <style>
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #778C49;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            padding-left: 20px; 
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap; 
        }

        footer h1 {
            margin: 0;
            font-size: 18pt; 
        }

        .subscribe-text {
            margin-bottom: 16px; 
        }

        .subscribe-input {
            width: calc(100% - 120px); 
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ffffff;
        }

        .subscribe-button {
            padding: 5px 10px;
            background-color: #ffffff;
            color: #778C49;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px; 
        }


        @media screen and (max-width: 768px) {
            footer {
                flex-direction: column; 
                align-items: center; 
            }

            .subscribe-input {
                width: 100%; 
                margin-bottom: 16px; 
            }
        }
    </style>
</head>
<body>

<footer>
    <h1>&copy; 2024 EdenGrove All Rights Reserved.</h1>
    <div>
        <div class="subscribe-text">Get new products and promotions in your inbox</div>
        <form>
            <input type="email" class="subscribe-input" placeholder="Your email">
            <button type="submit" class="subscribe-button">SUBSCRIBE</button>
        </form>
    </div>
</footer>

</body>
</html>
