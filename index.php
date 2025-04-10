<?php
// requiring backend for showing results 
require("./querry.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- style sheet  -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- container  -->
<div class="container">
<!-- form starts   -->
<form action="./index.php" method="POST">
    <!-- first querry button  -->
<div class="querry">
    <button name="onequerry"> click to run querry one </button>
</div>
<!-- second querry button  -->
<div class="querry">
    <button name="secondquerry"> click to run querry two</button>
</div>
<!-- third  querry button  -->
<div class="querry">
    <button name="thirdquerry"> click to run querry three </button>
</div>
<!-- fourth querry button  -->
<div class="querry">
    <button name="onequerry"> click to run querry four</button>
</div>
<!-- fifth querry button  -->
<div class="querry">
    <button name="onequerry"> click to run querry five </button>
</div>
<!-- sixth querry button  -->
<div class="querry">
    <button name="onequerry"> click to run querry six </button>
</div>
<!-- seventh querry button  -->
<div class="querry">
    <button name="onequerry"> click to run querry seven</button>
</div>

</form>
<!-- div for showing results   -->
<div class="answer" style="color: red;font-size: 30px" >
<?php 
// display results 
echo $querry->result;
?>
</div>
</div>
</body>
</html>