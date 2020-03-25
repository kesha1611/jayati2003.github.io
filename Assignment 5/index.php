<?php
$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}

$db_selected = mysqli_select_db($link, 'workshop');

if (!$db_selected) {
  $sql = 'CREATE DATABASE workshop';
  if (mysqli_query($link, $sql)) {
    $link = mysqli_connect('localhost', 'root', '', 'workshop');
      $sql = "CREATE TABLE register (
            id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            dob VARCHAR(10) NOT NULL,
            email VARCHAR(30),
            phone BIGINT,
            profession VARCHAR(30),
            qualification VARCHAR(30),
            country VARCHAR(20),
            institute VARCHAR(100),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            
            if ($link->query($sql) === TRUE) {
                //echo "Table register created successfully";
            } else {
                //echo "Error creating table: " . $link->error;
            }
        
  } else {
      echo 'Error creating database: ' . mysql_error() . "\n";
  }
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

    <div class="details">
        <p>A workshop on "Web Technology" is organized by Progate Japan. It is an intensive week-long learning program and it is a combination of online and offline learning where you will learn web development from absolute basics and build your own first project! It is a great chance for all of you to learn the most demanded technologies such as HTML, CSS, Javascript, MySQL and PHP and to get prepared for your next internship. Certificates will be provided to all the participants and there is a chance to win prizes and goodies from Progate.</p>
    <p><span class="topic">Coordinator : </span>
        Jayati B. Sakervala</p>
        <p><span class="topic">Venue : </span>
        Chandubhai S. Patel Institute of Technology, Changa</p>
        <p><span class="topic">
            Date : </span>6-11th April, 2020</p>
            <p><span class="topic">
            Reporting time : </span>
            9.00 AM, Monday, 6th April 2020</p>
            <p><span class="topic">Intake : </span>A maximum of 1000 participants will be enrolled for this workshop on the first-come-first-served basis.</p>
    </div>

    <button class="register" onclick="location.href='form.php';">Register now</button>
    <div class="registered">
        <p>Already registered? <a href="check.php">Check your details</a></p>
    </div>
    <div class="footer">For any queries: Contact - Jayati Sakervala(contact@gmail.com)<br>National Workshop on Web Technology - 2020</div>
    </div>
</body>
</html> 