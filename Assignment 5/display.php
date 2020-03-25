<?php
    session_start();
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
        <p>Registration details</p>
    </div>
    <table id="dis">
        <tr>
            <td>Firstname</td>
            <td>: <?php echo $_SESSION['firstname']; ?></td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td>: <?php echo $_SESSION['lastname']; ?></td>
        </tr>
        <tr>
            <td>Date of birth</td>
            <td>: <?php echo $_SESSION['dob']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?php echo $_SESSION['email']; ?></td>
        </tr>
        <tr>
            <td>Phone no. </td>
            <td>: <?php echo $_SESSION['phone']; ?></td>
        </tr>
        <tr>
            <td>Profession</td>
            <td>: <?php echo $_SESSION['profession']; ?></td>
        </tr>
        <tr>
            <td>Highest Qualification</td>
            <td>: <?php echo $_SESSION['qualification']; ?></td>
        </tr>
        <tr>
            <td>Country</td>
            <td>: <?php echo $_SESSION['country']; ?></td>
        </tr>
        <tr>
            <td>Institute</td>
            <td>: <?php echo $_SESSION['institute']; ?></td>
        </tr>
        <tr>
            <td>Date of Registration</td>
            <td>: <?php echo $_SESSION['reg_date']; ?></td>
        </tr>
    </table>    
    <br><br>

    <a href="index.php" class="btn">Home</a>
    <div class="footer">For any queries: Contact - Jayati Sakervala(contact@gmail.com)<br>National Workshop on Web Technology - 2020</div>
    </div>

</body>
</html>