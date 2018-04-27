<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include_once 'connection.php';
session_start();

if(isset($_POST['opd_entry'])){ 
    $date=$_POST['date'];
    $p_name = $_POST['p_name'];
    $age=$_POST['age'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $guardian = $_POST['guardian'];
    $doc_id = $_POST['doc_id'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $disease = $_POST['disease'];
    $info=$_POST['info'];

     $query="INSERT INTO opd_entry (`dat`, `p_name`, `age`, `phone`,  `address`, `guardian`, `doc_id`, `gender`,  `weight`, `disease`, `info`) values('".$date."', '".$p_name."', '".$age."', '".$phone."', '".$address."', '".$guardian."', '".$doc_id."', '".$gender."', '".$weight."', '".$disease."', '".$info."')";
        mysqli_query($conn,$query);
         
            $_SESSION['saved'] = "New Entry  has been added to records !";
            header("location:opdentry.php");
    }
 ?>
