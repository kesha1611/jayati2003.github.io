<?php

$hostname = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "workshop";

$conn = mysqli_connect("localhost", "root", "", "workshop");

    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit();
    }

session_start();

if(isset($_POST['firstname'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
}
if(isset($_POST['lastname'])){
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
}
if(isset($_POST['dob'])){
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
}
if(isset($_POST['email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
}
if(isset($_POST['phone'])){
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
}
if(isset($_POST['profession'])){
    $profession = mysqli_real_escape_string($conn, $_POST['profession']);
}
if(isset($_POST['qualification'])){
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
}
if(isset($_POST['country'])){
    $country = mysqli_real_escape_string($conn, $_POST['country']);
}
if(isset($_POST['institute'])){
    $institute = mysqli_real_escape_string($conn, $_POST['institute']);
}

//Error Handlers

if(!empty($firstname) || !empty($email) || !empty($phone) || !empty($lastname) || !empty($dob) || !empty($profession) || !empty($qualification) || !empty($country) || !empty($institute)){
    
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../form.php?form=invalidemail");
        exit();
        } else {
                $SELECT = "SELECT email From register Where email = ? Limit 1";
                $INSERT = "INSERT Into register (firstname, lastname, dob, email, phone, profession, qualification, country, institute) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s",$email);
                $stmt->execute();
                $stmt->bind_result($email);
                $stmt->store_result();
                $rnum = $stmt->num_rows;

                if($rnum==0){
                    $stmt->close();
                    $SELECT1 = "SELECT phone From register Where phone = ? Limit 1";
                    $INSERT = "INSERT Into register (firstname, lastname, dob, email, phone, profession, qualification, country, institute) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($SELECT1);
                    $stmt->bind_param("i",$phone);
                    $stmt->execute();
                    $stmt->bind_result($phone);
                    $stmt->store_result();
                    $rnum2 = $stmt->num_rows;

                    if($rnum2==0){
                        $stmt->close();
                    
                    $stmt = $conn->prepare($INSERT);
                    $stmt->bind_param("ssssissss", $firstname, $lastname, $dob, $email, $phone, $profession, $qualification, $country, $institute);
                    $stmt->execute();
                    $stmt->close();
                    $sql = "SELECT * From register where email='".$email."' AND firstname='".$firstname."' limit 1";

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
                    } else {
                        $message = "Phone number exists!";
    
                        echo "<script type='text/javascript'>window.alert('$message');</script>";
                        echo "<script type='text/javascript'>window.location.href='form.php';</script>";
                    }
        } else{
            $message = "Email already exists!";
    
                        echo "<script type='text/javascript'>window.alert('$message');</script>";
                        echo "<script type='text/javascript'>window.location.href='form.php';</script>";
        }
    }

/*echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;*/
    }else {
    $message = "Please fill out all the details!";
    
    echo "<script type='text/javascript'>window.alert('$message');</script>";
    echo "<script type='text/javascript'>window.location.href='form.php';</script>";
    exit();
}
?>