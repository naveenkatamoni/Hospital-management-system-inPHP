<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include_once 'connection.php';
session_start();

if(isset($_POST['add_bill'])){ 
    $patient_id= $_POST['patient_id'];
    $p_name = $_POST['p_name'];
    $checkup=$_POST['checkup'];
    $collected = $_POST['collected'];
    $date=$_POST['date'];
    $charges = $_POST['charges'];
    $ocharges = $_POST['ocharges'];
    $t_charges = $_POST['t_charges'];

     $query="INSERT INTO opd_billing (`patient_id`, `p_name`, `checkup`, `collected`,  `date`, `charges`, `ocharges`, `t_charges`) values('".$patient_id."', '".$p_name."', '".$checkup."', '".$collected."', '".$date."', '".$charges."', '".$ocharges."', '".$t_charges."')";
        mysqli_query($conn,$query);
         
            $_SESSION['saved'] = "New Bill   has been added to records !";
            header("location:billing.php");
    }
 ?>
