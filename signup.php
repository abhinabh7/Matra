<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>

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
    
    .signup-container {
      background-color: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 300px;
    }
    
    .signup-container h2 {
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
    
    .signup-btn {
      width: 100%;
      padding: 10px;
      background-color: #ff4d4d;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    .signup-btn:hover {
      background-color: #ff1a1a;
    }
    
    .signin-link {
      text-align: center;
      margin-top: 15px;
    }
  </style>
</head>
<body>
<?php include'header.php'; ?>
  <div class="signup-container">
    <h2>Sign Up</h2>
    <form action="process-singup.php" method="post" id="signup" >
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname"  required>
      </div>
      <div class="form-group">
        <label for="username">Email</label>
        <input type="email" id="email" name="email" required >
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirmpassword">Confirm Password</label>
        <input type="password" id="confirmpassword" name="confirmpassword" required>
      </div>      
      <button type="submit" class="signup-btn">Sign up</button>
    </form>
    <div class="signin-link">
      <p>Already a member? <a href="login.php">Sign in</a></p>
    </div>
  </div>
</body>
</html>