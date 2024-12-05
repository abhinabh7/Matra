<?php
$product_name = "";
$product_category = "";
$product_price = "";
$product_stock = "";

$errorMessage = "";
$successMessage = "";

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "sheesh";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get product ID from query parameter
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $result = $connection->query("SELECT * FROM products WHERE id=$id");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_name = $row['name'];
        $product_category = $row['category'];
        $product_price = $row['price'];
        $product_stock = $row['stock'];
    } else {
        die("Product not found.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = mysqli_real_escape_string($connection, $_POST["name"]);
    $product_category = mysqli_real_escape_string($connection, $_POST["category"]);
    $product_price = mysqli_real_escape_string($connection, $_POST["price"]);
    $product_stock = mysqli_real_escape_string($connection, $_POST["stock"]);

    do {
        if (empty($product_name) || empty($product_category) || empty($product_price) || empty($product_stock)) {
            $errorMessage = "All fields are required.";
            break;
        }

        // Update query
        $sql = "UPDATE products SET name='$product_name', category='$product_category', price='$product_price', stock='$product_stock' WHERE id=$id";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Error: " . $connection->error;
            break;
        }

        $successMessage = "Product details updated successfully.";

        // Redirect to product list page
        header("Location: ./product-list.php");
        exit;
    } while (false);
}

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .alert {
            color: #d9534f;
            margin-bottom: 15px;
        }

        .success {
            color: #5cb85c;
            margin-bottom: 15px;
        }

        .login-btn {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #4cae4c;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            color: #5bc0de;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Product</h2>

        <?php if (!empty($errorMessage)): ?>
            <div class="alert">
                <strong><?php echo $errorMessage; ?></strong>
            </div>
        <?php endif; ?>

        <?php if (!empty($successMessage)): ?>
            <div class="success">
                <strong><?php echo $successMessage; ?></strong>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($product_name); ?>">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" name="category" value="<?php echo htmlspecialchars($product_category); ?>">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" value="<?php echo htmlspecialchars($product_price); ?>">
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" name="stock" value="<?php echo htmlspecialchars($product_stock); ?>">
            </div>

            <button type="submit" class="login-btn">Update</button>
            <a href="./product-list.php" role="button">Cancel</a>
        </form>
    </div>
</body>

</html>
