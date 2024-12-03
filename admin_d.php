<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        .summary-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h2 {
            margin: 0;
            font-size: 30px;
        }

        .card p {
            margin: 5px 0 0;
            color: #777;
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
            <li><a href="./admin_d.php" class="active">Customer</a></li>
            <li><a href="./product-list.php">Product</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Income</a></li>
            <li><a href="#">Promote</a></li>
            <li><a href="#">Help</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1>Admin,</h1>
        <div class="summary-cards">
            <div class="card">
                <h2>5,423</h2>
                <p>Total Customers</p>
            </div>
            <div class="card">
                <h2>1,893</h2>
                <p>Members</p>
            </div>
        </div>

        <div class="customers">
            <h2>All Customers</h2>
            <a href="add-customer.php" class="add-customer-btn">Add Customer</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "sheesh";

                    $connection = new mysqli($servername, $username, $password, $database);

                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }

                    $sql = "SELECT * FROM clients";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query" . $connection->error);
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['address']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='action-btn edit-btn'>Edit</a>
                                <a href='delete.php?id={$row['id']}' class='action-btn delete-btn'>Delete</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>