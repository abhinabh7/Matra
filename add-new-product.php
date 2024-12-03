<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "sheesh";

// Create connection
$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Initialize variables for error messages
$nameErr = $categoryErr = $priceErr = $stockErr = "";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize it
    $name = $connection->real_escape_string($_POST['name']);
    $category = $connection->real_escape_string($_POST['category']);
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Validation checks
    if (empty($name)) {
        $nameErr = "Product name is required";
    }

    if (empty($category)) {
        $categoryErr = "Category is required";
    }

    if (empty($price) || !is_numeric($price)) {
        $priceErr = "Valid price is required";
    }

    if (empty($stock) || !is_numeric($stock)) {
        $stockErr = "Valid stock quantity is required";
    }

    // If no errors, insert the data into the database
    if (empty($nameErr) && empty($categoryErr) && empty($priceErr) && empty($stockErr)) {
        $sql = "INSERT INTO products (name, category, price, stock) VALUES ('$name', '$category', '$price', '$stock')";

        if ($connection->query($sql) === TRUE) {
            echo "<p>New product added successfully!</p>";
            header("Location: product_list.php"); // Redirect to the product list page
            exit;
        } else {
            echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .form-container {
            width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Product</h2>

        <form action="add_product.php" method="POST">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
            <span class="error"><?php echo $nameErr; ?></span>

            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="<?php echo isset($category) ? $category : ''; ?>">
            <span class="error"><?php echo $categoryErr; ?></span>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo isset($price) ? $price : ''; ?>">
            <span class="error"><?php echo $priceErr; ?></span>

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="<?php echo isset($stock) ? $stock : ''; ?>">
            <span class="error"><?php echo $stockErr; ?></span>

            <input type="submit" value="Add Product">
        </form>
    </div>
</body>
</html>
