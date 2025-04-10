<?php


session_start();

// If already logged in, redirect to index
if (isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $password = $_POST["password"];

    if ($name === "admin" && $password === "admin123") {
        $_SESSION['name'] = $name;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid credentials. Please try again.";
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Form</title>
<style>
    /* Reset some defaults */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: #f0f2f5;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.login-container {
  background: #ffffff;
  padding: 30px 40px;
  border-radius: 12px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  width: 350px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

.input-group {
  margin-bottom: 15px;
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 5px;
  font-weight: 500;
  color: #555;
}

input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 8px;
  outline: none;
  font-size: 14px;
  transition: border 0.3s;
}

input:focus {
  border-color: #007bff;
}

button {
  width: 100%;
  padding: 12px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}

</style>
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>

      <button type="submit" name="login">Login</button>
    </form>
  </div>

</body>
</html>
