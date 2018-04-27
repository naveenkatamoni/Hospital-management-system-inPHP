<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include_once 'connection.php';
session_start();

if(isset($_POST['add_physician'])){ 
    $img = $_FILES['img']['name'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $address = $_POST['address'];
    $specialization = $_POST['specialization'];
    $experience = $_POST['experience'];
    $duty = $_POST['duty'];
    $offday = $_POST['offday'];
    $regdate = $_POST['regdate'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone']; 
    $email=$_POST['email'];

    $target_dir = "physicians/";

    $target_file = $target_dir.basename($_FILES["img"]["name"]); 
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file); 

     $query="INSERT INTO physicians (`img`, `name`, `type`, `address`,  `specialization`, `experience`, `duty`, `offday`,  `regdate`, `gender`, `phone`, `email`) values('".$img."', '".$name."', '".$type."', '".$address."', '".$specialization."', '".$experience."', '".$duty."', '".$offday."', '".$regdate."', '".$gender."', '".$phone."', '".$email."')";
        mysqli_query($conn,$query);
         
            $_SESSION['saved'] = "New Doctor has been added to records !";
            header("location:physicians.php");
    }
 ?>
