<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "sheesh";
$connection = new mysqli($host, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch products
$sql = "SELECT * FROM products ORDER BY created_at DESC";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .dashboard-container {
            display: flex;
            height: calc(100vh - 70px);
            margin-top: 70px;
        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            padding: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            text-decoration: none;
            font-size: 16px;
            color: #666;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: #e74c3c;
            color: #fff;
        }

        .main-content {
            flex: 1;
            padding: 30px;
        }

        .main-content h1 {
            margin: 0;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .customers {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .customers h2 {
            margin-bottom: 20px;
        }

        .add-customer-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .add-customer-btn:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f9f9f9;
        }

        .action-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 5px;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .edit-btn {
            background-color: #2ecc71;
            color: #fff;
        }

        .edit-btn:hover {
            background-color: #27ae60;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: #fff;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <li><a href="./admin_d.php">Customer</a></li>
                <li><a href="#" class="active">Product</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="income.php">Income</a></li>
                <li><a href="promote.php">Promote</a></li>
                <li><a href="help.php">Help</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Product List</h1>
            <div class="customers">
                <h2>All Products</h2>
                <a href="add-new-product.php" class="add-customer-btn">Add New Product</a>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']) ?></td>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['category']) ?></td>
                                <td><?= htmlspecialchars($row['price']) ?></td>
                                <td><?= htmlspecialchars($row['stock']) ?></td>
                                <td>
                                    <a href="edit_product.php?id=<?= $row['id'] ?>" class="action-btn edit-btn">Edit</a>
                                    <a href="delete_product.php?id=<?= $row['id'] ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
