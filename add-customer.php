<?php
$name = "";
$email = "";
$phone = "";
$address = "";

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);

    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "All fields are required.";
            break;
        }

        // Insert query
        $sql = "INSERT INTO clients (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Error: " . $connection->error;
            break;
        }

        // Reset fields upon success
        $name = "";
        $email = "";
        $phone = "";
        $address = "";

        $successMessage = "Customer added successfully.";

        // Redirect to admin dashboard
        header("Location: ./admin_d.php");
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
    <title>Add Customer</title>
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
        <h2>Add Customer</h2>

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
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">
            </div>

            <button type="submit" class="login-btn">Submit</button>
            <a href="./admin_d.php" role="button">Cancel</a>
        </form>
    </div>
</body>

</html>
