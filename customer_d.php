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

        /* Container setup */
   /* Adjust the dashboard container to sit below the fixed header */
.dashboard-container {
    display: flex;
    height: calc(100vh - 70px); /* Subtract the height of the header */
    margin-top: 70px; /* Ensure the dashboard starts below the fixed header */
}


    /* Sidebar styling */
    .sidebar {
      width: 250px;
      background-color: #fff;
      border-right: 1px solid #ddd;
      padding: 20px;
    }

    .sidebar h2 {
      font-size: 22px;
      margin-bottom: 40px;
      font-weight: bold;
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

        .main {
            flex-grow: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        /* .search-box {
      position: absolute;
      top: 20px;
      right: 30px;
    }

    .search-box input {
      padding: 8px 15px;
      border: 1px solid #ddd;
      border-radius: 20px;
      font-size: 14px;
    } */

        .details-section {
            display: flex;
            gap: 20px;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
        }

        .profile-section {
            margin: 50px 0px 0;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 2;
        }

        .profile-section img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile-section h3 {
            margin: 0;
        }

        .profile-section p {
            margin: 5px 0;
            color: #777;
        }

        .edit-btn {
            background-color: #ff4d4d;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .edit-btn:hover {
            background-color: #e04343;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .stats div {
            text-align: center;
        }
    </style>
</head>
<body>
<?php include'header.php'; ?>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- <h2>Dashboard</h2> -->
          <ul>
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="#">Product</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Income</a></li>
            <li><a href="#">Promote</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>

        <div class="main">
            <div class="header">
                <h2>Welcome Abhi,</h2>
                <!-- <div class="search-box">
                    <input type="text" placeholder="Search">
                </div> -->
            </div>

            <div class="details-section">
                <div class="card">
                    <h3>1,250</h3>
                    <p>Points Balance</p>
                </div>
                <div class="card">
                    <h3>12</h3>
                    <p>Pending</p>
                </div>
            </div>

            <div class="profile-section">
                <img src="placeholder.png" alt="Profile Picture">
                <h3>Duval Abhinabh</h3>
                <p>Contact: 2030930032</p>
                <p>Email: abji@google.com</p>
                <p>Card: Standard</p>
                <p>Country: Russia</p>
                <button class="edit-btn">Edit</button>

                <div class="stats">
                    <div>
                        <h3>5</h3>
                        <p>Purchases</p>
                    </div>
                    <div>
                        <h3>1</h3>
                        <p>Returns</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
