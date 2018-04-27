<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include_once 'connection.php';
session_start();

if(isset($_POST['add_service'])){ 
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price=$_POST['price']; 

     $query="INSERT INTO services (`service_name`, `category`, `description`, `price`) values('".$name."','".$category."','".$description."', '".$price."')";
        mysqli_query($conn,$query);
         
            $_SESSION['saved'] = "New service has been added!";
            header("location:services.php");
    }
 ?>
