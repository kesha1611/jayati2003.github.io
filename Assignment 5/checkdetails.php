<?php

$conn = mysqli_connect("localhost", "root", "", "workshop");

    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit();
    }


    session_start();

    if(isset($_POST['cemail'])){
        $email = mysqli_real_escape_string($conn, $_POST['cemail']);
    }

    $sql = "SELECT * From register where email='".$email."' limit 1";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['dob'] = $row['dob'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['profession'] = $row['profession'];
    $_SESSION['qualification'] = $row['qualification'];
    $_SESSION['country'] = $row['country'];
    $_SESSION['institute'] = $row['institute'];
    $_SESSION['reg_date'] = $row['reg_date'];
    header("Location: display.php");
    exit();

    ?>