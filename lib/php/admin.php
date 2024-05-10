<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styleguide.css">
    <style>

        @media only screen and (max-width: 768px) {
        }

        @media only screen and (min-width: 769px) and (max-width: 1024px) {
        }

        @media only screen and (min-width: 1025px) {
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 80px;
            margin-top: 20px;
        }
        .admin-title {
            color: black;
            font-size: 24px;
        }
        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            padding: 0 80px; 
            align-items: flex-start;
        }
        .container {
            padding: 24px;
            border: 1px solid #ccc;
            margin-right: 24px; 
            margin-bottom: 24px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            flex: 0 0 calc(25% - 48px); 
            min-width: 260px;
            height: auto;
        }

        .container:nth-child(4n) {
            margin-right: 0;
        }
        .search-bar {
            display: flex;
            margin: 0;
        }
        .search-bar form {
            display: flex;
            align-items: center;
        }
        .search-bar input[type="text"] {
            height: 40px;
            border-radius: 20px;
            border: 2px solid #4B9EBF;
            padding: 0 20px;
            font-size: 18px;
            margin-right: 10px;
        }
        .search-bar button {
            height: 40px;
            border-radius: 20px;
            background-color: #4B9EBF;
            color: white;
            border: none;
            padding: 0 20px;
            font-size: 18px;
            cursor: pointer;
        }

        img {
        max-width: 100%;
        height: auto;
        }


        .container:nth-last-child(2) {
            flex-basis: calc(50% - 48px); 
        }
        .container:last-child {
            flex-basis: calc(50% - 48px); 
        }
        /* Adjust container 5 and 6 */
        .container:nth-child(5),
        .container:nth-child(6) {
            width: calc(50% - 48px); 
        }



        .price-container {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }
        .price {
            color: black;
            font-size: 24px;
        }
        .percentage {
            color: green;
            font-size: 18px;
        }

        .product-item-container {
            width: 50%; 
            float: left; 
            padding-right: 10px; 
        }

        .product-item {
            border: 1px solid #ccc;
            padding: 10px;
            display: flex;
        }

        .product-image {
            flex: 0 0 120px; 
        }

        .product-info {
            flex-grow: 1; 
            padding-left: 10px; 
        }

        .product-info h3 {
            color: #778C49;
            cursor: pointer;
        }

        .modal {
            display: none; 
            position: fixed; 
            z-index: 9999; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.4); 
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 60%; 
            max-width: 800px; 
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 10px;
        }


        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }


        .modal-button {
            background-color: #778C49;
            color: white;
            border: none;
            border-radius: 16px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 10px;
        }

        .delete-button {
            background-color: #778C49;
            color: white;
            border: none;
            border-radius: 16px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }


        .container:nth-child(5),
        .container:nth-child(6) {
            flex: 0 0 calc(50% - 48px); 
            margin-right: 24px; 
        }


        .user-item-container {
            width: calc(50% - 48px); 
            margin: 10px 24px; 
            height: 160px; 
            border: 1px solid #ccc; 
            padding: 10px; 
        }

        .user-item {
        }

        .user-column {
            width: 45%; 
            float: left; 
            margin-right: 10px; 
        }


        .user-column:last-child {
            margin-right: 0;
        }

        .task-buttons {
    display: flex;
}

.task-button {
    border: 2px solid #778C49;
    color: #778C49;
    background-color: transparent;
    border-radius: 16px;
    padding: 8px 16px;
    font-size: 16px;
    cursor: pointer;
    margin-right: 16px; 
}

.task-button:hover {
    background-color: #BDBF6F;
}

.task-button.complete {
    border-color: #778C49;
    color: #778C49;
}

.task-button.selected {
    background-color: #778C49;
    color: white;
}


    </style>
</head>
<body>
    <?php include 'header_admin.php'; ?>
    <?php include 'products_data.php'; ?>

    <main>
        <div class="admin-header">
            <h1 class="admin-title">Admin Panel</h1>
            <div class="search-bar">
                <form action="products.php" method="GET">
                    <input type="text" name="keyword" placeholder="Search..." aria-label="Search products">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="dashboard-container">

            <div class="container">
                <h2 style="color: grey;">Today's Sale</h2>
                <div class="price-container">
                    <p class="price">$<?php echo number_format(rand(10000, 99999) + 0.00, 2); ?></p>
                    <p class="percentage">+<?php echo rand(1, 50); ?>%</p>
                </div>
            </div>

            <div class="container">
                <h2 style="color: grey;">Total Sales</h2>
                <div class="price-container">
                    <p class="price">$<?php echo number_format(rand(10000, 99999) - 0.00, 2); ?></p>
                    <p class="percentage">+<?php echo rand(1, 50); ?>%</p>
                </div>
            </div>

            <div class="container">
                <h2 style="color: grey;">Total Orders</h2>
                <div class="price-container">
                    <p class="price"><?php echo number_format(rand(10000, 99999) - 0.00, 2); ?></p>
                    <p class="percentage">-<?php echo rand(1, 50); ?>%</p>
                </div>
            </div>

            <div class="container">
                <h2 style="color: grey;">Total Customers</h2>
                <div class="price-container">
                    <p class="price"><?php echo number_format(rand(10000, 99999) - 0.00, 2); ?></p>
                    <p class="percentage">-<?php echo rand(1, 50); ?>%</p>
                </div>
            </div>


    <div class="container" style="height: 1450px; margin: 0 auto; overflow-y: auto;">
        <h2>Product Management</h2>
        <div class="product-list">
            <?php

            $num_products = count($products);
            $products_per_row = 2;
            $num_rows = ceil($num_products / $products_per_row);

            for ($row = 0; $row < $num_rows; $row++) {
                echo '<div class="row">';
                for ($col = 0; $col < $products_per_row; $col++) {
                    $index = $row * $products_per_row + $col;
                    if ($index < $num_products) {
                        $product = $products[$index];
                        ?>
                        <div class="product-item-container" style="max-width: 45%; margin: 10px auto; height: 200px;">
                            <div class="product-item">

                                <div class="product-image">
                                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['title']; ?>" style="max-width: 100%; height: auto;">
                                </div>

                                <div class="product-info">
                                    <h3 onclick="openEditModal('<?php echo $product['image']; ?>', '<?php echo $product['title']; ?>', '<?php echo $product['price']; ?>', <?php echo rand(5, 50); ?>)">
                                        <?php echo $product['title']; ?>
                                    </h3>
                                    <p>Price: <?php echo $product['price']; ?></p>
                                    <p>Stock: <?php echo rand(5, 50); ?> available</p> <!-- Example of generating random available stock -->
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                echo '</div>';
            }
            ?>

            <div class="row">
                <div class="product-item-container" style="max-width: 45%; margin: 10px auto; height: 200px;">
                    <button class="modal-button" onclick="openAddProductModal()">Add New Product</button>
                </div>
            </div>
        </div>
    </div>

<div class="container" style="height: 1450px; margin: 0 auto; overflow-y: auto;">
    <h2>Team task Management</h2>
    <div class="task-list">
        <div class="task-item" id="task1" style="padding-top: 32px;">
            <p><strong>Task 1:</strong> Order more stock for outdoor dining sets.</p>
            <div class="task-buttons">
                <button class="task-button" data-status="onHold" onclick="toggleStatus('task1', 'onHold')">On Hold</button>
                <button class="task-button" data-status="inProgress" onclick="toggleStatus('task1', 'inProgress')">In Progress</button>
                <button class="task-button" data-status="complete" onclick="toggleStatus('task1', 'complete')">Complete</button>
            </div>
        </div>
        <div class="task-item" id="task2" style="padding-top: 32px;">
    <p><strong>Task 2:</strong> Update product descriptions for the new line of patio umbrellas.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task2', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task2', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task2', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task3" style="padding-top: 32px;">
    <p><strong>Task 3:</strong> Negotiate terms with the new outdoor lighting supplier.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task3', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task3', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task3', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task4" style="padding-top: 32px;">
    <p><strong>Task 4:</strong> Plan summer sale promotion for outdoor furniture.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task4', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task4', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task4', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task5" style="padding-top: 32px;">
    <p><strong>Task 5:</strong> Follow up with customers who recently purchased hammocks.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task5', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task5', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task5', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task6" style="padding-top: 32px;">
    <p><strong>Task 6:</strong> Monitor reviews and feedback for the new line of garden benches.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task6', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task6', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task6', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task7" style="padding-top: 32px;">
    <p><strong>Task 7:</strong> Remove discontinued items from the website.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task7', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task7', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task7', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task8" style="padding-top: 32px;">
    <p><strong>Task 8:</strong> Analyze sales data for outdoor lounge chairs.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task8', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task8', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task8', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task9" style="padding-top: 32px;">
    <p><strong>Task 9:</strong> Create engaging social media posts showcasing new outdoor furniture arrivals.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task9', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task9', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task9', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task10" style="padding-top: 32px;">
    <p><strong>Task 10:</strong> Conduct quality checks on incoming shipments of outdoor cushions.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task10', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task10', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task10', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task11" style="padding-top: 32px;">
    <p><strong>Task 11:</strong> Organize training session for sales staff on new product features and promotions.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task11', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task11', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task11', 'complete')">Complete</button>
    </div>
</div>

<div class="task-item" id="task12" style="padding-top: 32px;">
    <p><strong>Task 12:</strong> Optimize website for better search engine visibility.</p>
    <div class="task-buttons">
        <button class="task-button" data-status="onHold" onclick="toggleStatus('task12', 'onHold')">On Hold</button>
        <button class="task-button" data-status="inProgress" onclick="toggleStatus('task12', 'inProgress')">In Progress</button>
        <button class="task-button" data-status="complete" onclick="toggleStatus('task12', 'complete')">Complete</button>
    </div>
</div>


        </div>
    </div>
</div>




<div id="addProductModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAddProductModal()">&times;</span>
        <div id="addProductInfo">
            <img src="OraSlateGrayLoungeChair.jpg" alt="Ora Slate Gray Lounge Chair" style="max-width: 100%; height: auto;">
            <h2>Ora Slate Gray Lounge Chair</h2>
            <p>$349.99</p>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" min="0" max="100" value="20">
            <button onclick="addProduct()">Add Product</button>
        </div>
    </div>
</div>


<div id="editProductModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" onclick="closeEditModal()">&times;</span>
        <div id="editProductInfo">
            <img id="editProductImage" src="" alt="" style="max-width: 100%; height: auto;">
            <h2 id="editProductTitle"></h2>
            <p id="editProductPrice"></p>
            <label for="editStock">Stock:</label>
            <input type="number" id="editStock" name="editStock" min="0" max="100">
            <button onclick="saveChanges()">Save Changes</button>
        </div>
    </div>
</div>
    </main>

     <div id="editModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <div id="editProductInfo">
            </div>
        </div>
    </div>


<div id="addProductModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" onclick="closeAddProductModal()">&times;</span>
        <div id="addProductInfo">
            <img src="OraSlateGrayLoungeChair.jpg" alt="Ora Slate Gray Lounge Chair" style="max-width: 100%;">
            <input type="text" id="addTitle" value="Ora Slate Gray Lounge Chair" readonly>
            <input type="text" id="addPrice" value="$499" readonly>
            <input type="text" id="addStock" value="32" readonly>
            <!-- Save button -->
            <button class="modal-button" onclick="saveNewProduct()">Save</button>
        </div>
    </div>
</div>




    <?php include 'footer_admin.php'; ?>

    <script>
    function openEditModal(image, title, price, stock) {
        var modal = document.getElementById('editProductModal');
        var modalContent = document.getElementById('editProductInfo');

        if (!modal || !modalContent) {
            console.error('Modal or Modal Content not found!');
            return;
        }


        modalContent.innerHTML = `
            <img src="${image}" alt="${title}" style="max-width: 100%;">
            <input type="text" id="editTitle" value="${title}">
            <input type="text" id="editPrice" value="${price}">
            <input type="text" id="editStock" value="${stock}">
            <button class="modal-button" onclick="saveChanges('${title}', '${price}', '${stock}')">Save</button>
            <button class="delete-button" onclick="deleteItem('${title}')">Delete</button>
        `;

        modal.style.display = "block";
    }

    function closeEditModal() {
        var modal = document.getElementById('editProductModal');
        if (modal) {
            modal.style.display = "none";
        } else {
            console.error('Modal not found!');
        }
    }

    function saveChanges(oldTitle, oldPrice, oldStock) {
        var editedTitle = document.getElementById('editTitle').value;
        var editedPrice = document.getElementById('editPrice').value;
        var editedStock = document.getElementById('editStock').value;
        var productTitles = document.querySelectorAll('.product-info h3');
        productTitles.forEach(function (titleElement) {
            if (titleElement.innerText === oldTitle) {
                titleElement.innerText = editedTitle;
                var priceElement = titleElement.nextElementSibling;
                var stockElement = priceElement.nextElementSibling;
                priceElement.innerText = 'Price: ' + editedPrice;
                stockElement.innerText = 'Stock: ' + editedStock + ' available';
            }
        });

        closeEditModal();
    }

    function deleteItem(title) {
        var productItems = document.querySelectorAll('.product-item');
        var deletedItemRow;
        productItems.forEach(function (item) {
            var itemTitle = item.querySelector('.product-info h3').innerText;
            if (itemTitle === title) {
                deletedItemRow = item.parentElement;
                item.remove();
            }
        });

        closeEditModal();

        if (deletedItemRow) {
            var remainingItems = deletedItemRow.querySelectorAll('.product-item');
            if (remainingItems.length === 0) {
                deletedItemRow.remove();
            } else {
                remainingItems.forEach(function (item, index) {
                    var newRow = document.querySelector('.container:nth-child(5) .row:nth-child(2)');
                    newRow.appendChild(item);
                });
            }
        }
    }

function openAddProductModal() {
        var modal = document.getElementById('addProductModal');
        // Display the modal
        modal.style.display = "block";
    }

    function closeAddProductModal() {
        var modal = document.getElementById('addProductModal');
        modal.style.display = "none";
    }

    function saveNewProduct() {

    var newTitle = document.getElementById('addTitle').value;
    var newPrice = document.getElementById('addPrice').value;
    var newStock = document.getElementById('addStock').value;
    
    var newItemHTML = `
        <div class="product-item-container" style="max-width: 45%; margin: 10px auto; height: 200px;">
            <div class="product-item">
                <div class="product-image">
                    <img src="OraSlateGrayLoungeChair.jpg" alt="Ora Slate Gray Lounge Chair" style="max-width: 100%; height: auto;">
                </div>
                <div class="product-info">
                    <h3 onclick="openEditModal('OraSlateGrayLoungeChair.jpg', '${newTitle}', '${newPrice}', ${newStock})">
                        ${newTitle}
                    </h3>
                    <p>Price: ${newPrice}</p>
                    <p>Stock: ${newStock} available</p>
                </div>
            </div>
        </div>
    `;
    
    var productList = document.querySelector('.product-list');
    productList.insertAdjacentHTML('beforeend', newItemHTML);

    closeAddProductModal();
}

function updateTaskStatus(status, button) {
    const buttons = document.querySelectorAll('.task-button');
    buttons.forEach(btn => {
        btn.style.backgroundColor = 'white';
        btn.style.color = '#778C49';
    });

    button.style.backgroundColor = '#778C49';
    button.style.color = 'white';
}

function completeTask(taskId) {
    var taskElement = document.getElementById(taskId);
    if (taskElement) {
        taskElement.remove();
        renumberTasks();
    }
}

function renumberTasks() {
    var taskItems = document.querySelectorAll('.task-item');
    taskItems.forEach(function(task, index) {
        task.querySelector('strong').innerText = 'Task ' + (index + 1) + ':';
    });
}

function toggleStatus(taskId, status) {
    var task = document.getElementById(taskId);
    var buttons = task.getElementsByClassName('task-button');
    for (var i = 0; i < buttons.length; i++) {
        var button = buttons[i];
        button.classList.remove('selected');
    }
    var clickedButton = event.target;
    clickedButton.classList.add('selected');
}

    </script>
</body>
</html>