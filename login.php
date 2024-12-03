<?php 

$is_invalid = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $mysqli = require __DIR__ . "/database.php";

  $sql = sprintf("SELECT * FROM user
                  WHERE email = '%s'",
                  $mysqli->real_escape_string($_POST["email"]));
  
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();


  if ($user) {
    if (password_verify($_POST["password"], $user["password_hash"])) {
      session_start();

      $_SESSION["user_id"] = $user["id"];
      header("Location: index.php");
      exit;
  }
  }
  $is_invalid = true;
}




?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .login-container {
      background-color: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .login-btn {
      width: 100%;
      padding: 10px;
      background-color:   #e5595d;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .login-btn:hover {
      background-color: #ff4d4d;
    }

    .signup-link {
      text-align: center;
      margin-top: 15px;
    }
  </style>
</head>
<body>
<?php include'header.php'; ?>

<?php if ($is_invalid): ?>
  <em>Invalid login</em>
<?php endif; ?>

  <div class="login-container">
    <h2>Login</h2>
    <form method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required >
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" class="login-btn">Login</button>
    </form>
    <div class="signup-link">
      <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
  </div>
</body>
</html>