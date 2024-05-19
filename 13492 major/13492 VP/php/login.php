<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define username and password
    $username = "sohail";
    $password = "khan1234";

    // Retrieve form data
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Check if username and password match
    if ($input_username === $username && $input_password === $password) {
        // Redirect to dashboard.php
        header("Location: dashboard.php");
        exit;
    } else {
        // Show alert message for invalid username or password
        echo '<script>alert("Invalid username or password. Please try again.");</script>';
        // Redirect back to login page 
    }
} 
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-image: url("../icon/dash_back.jpg");
      background-size: cover;
    }
    h2{
      text-align: center;

    }
    input[type="text"],
    input[type="password"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Sign in</h2>
  <form action="login.php" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Login">
  </form>
</div>

</body>
</html>
