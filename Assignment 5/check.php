<?php

$conn = mysqli_connect("localhost", "root", "", "workshop");

    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit();
    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="A5.css">
</head>
<body>
    <div class="container">
    <div class="header">
        National Workshop on Web Technology
    </div>
        <form action="checkdetails.php" method="POST" id="workshop">
            <label for="cemail">Enter registered email<br>
            <input typpe="email" id="cemail" placeholder="EmailID.." name="cemail">
            <br><button type="submit" class="btn">Check details</button>
        </form>
        <div class="footer">For any queries: Contact - Jayati Sakervala(contact@gmail.com)<br>National Workshop on Web Technology - 2020</div>
    </div>
</body>
</html>