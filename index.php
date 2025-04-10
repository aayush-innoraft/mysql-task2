<?php
session_start();

// Handle logout f
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit(); 
}


require("./querry.php");

// Check if user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

// User is logged in

 $welcoming = "Welcome, " . htmlspecialchars($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Query Dashboard</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="welcom">
        <?php 
        echo  $welcoming;
        ?>
    </div>
  <div class="container">
    <form action="./index.php" method="POST">
      <div class="querry">
        <button name="onequerry">Click to run query one</button>
      </div>
      <div class="querry">
        <button name="secondquerry">Click to run query two</button>
      </div>
      <div class="querry">
        <button name="thirdquerry">Click to run query three</button>
      </div>
      <div class="querry">
        <button name="fourthquerry">Click to run query four</button>
      </div>
      <div class="querry">
        <button name="fifthquerry">Click to run query five</button>
      </div>
      <div class="querry">
        <button name="sixthquerry">Click to run query six</button>
      </div>
      <div class="querry">
        <button name="onequerry">Click to run query seven</button>
      </div>
      <div class="querry">
        <button name="logout">Logout</button>
      </div>
    </form>

    <div class="answer" style="color: red; font-size: 30px">
      <?php
      // Show result from query class
      echo $querry->result;
      ?>
    </div>
  </div>
</body>
</html>
