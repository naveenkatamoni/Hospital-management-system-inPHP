<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

        <!-- Custom CSS -->
    <link href="../dist/css/admin-all-demo.css" rel="stylesheet">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once 'nav.php'; ?>

    <div id="page-content-wrapper">
        <div id="page-content">
            <div class="container">  
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard-box dashboard-box-chart bg-white content-box"> 
                            <h3 class="text-success">
                                <?php
                                if (isset($_SESSION['saved'])) {
                                echo $_SESSION['saved'];
                                }
                                ?>
                            </h3>
                            <br>
                            <form method="post" class="form-horizontal">
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Patient ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="patient_id" placeholder="Patient ID" required>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Doctor ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="doc_id" placeholder="Doctor ID" required>
                                    </div> 
                                </div>   
                                  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Medicine Name</label>
                                    <div class="col-sm-6">
                                       <input type="text" class="form-control" name="medicine" placeholder="Medicine Name" required> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Quantity</label>
                                    <div class="col-sm-6">
                                       <input type="number" class="form-control" name="quantity" placeholder="Quantity" required> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dosage</label>
                                    <div class="col-sm-6">
                                       <input type="text" class="form-control" name="dosage" placeholder="Dosage" required> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Services</label>
                                    <div class="col-sm-6">
                                      <select class="form-control" name="services">
                                            <?php
                                              include'connection.php';
                                              $sqli = "SELECT name From services";
                                              $res=mysqli_query($conn,$sqli);
                                              while($row=mysqli_fetch_array($res)){
                                                  echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                              }
                                           ?>
                                      </select> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Remarks</label>
                                    <div class="col-sm-6">
                                       <input type="text" class="form-control" name="remarks" placeholder="Remarks" required> 
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="add_medicine">
                                        <span>Save Appointment</span>
                                        <i class="glyph-icon icon-arrow-right"></i>
                                    </button>  
                                </div>  
                            </form>
                            <?php 
                                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                                include_once 'connection.php';

                                if(isset($_POST['add_medicine'])){ 
                                    $patient_id= $_POST['patient_id'];
                                    $doc_id= $_POST['doc_id'];
                                    $medicine = $_POST['medicine'];
                                    $quantity=$_POST['quantity'];
                                    $dosage=$_POST['dosage'];
                                    $services = $_POST['services'];
                                    $remarks = $_POST['remarks'];

                                     $query="INSERT INTO add_medicine (`patient_id`, `doc_id`, `medicine`,  `quantity`, `dosage`, `services`, `remarks`) values('".$patient_id."', '".$doc_id."', '".$medicine."', '".$quantity."', '".$dosage."',  '".$services."', '".$remarks."')";
                                        mysqli_query($conn,$query);
                                         
                                        $_SESSION['saved'] = "New Medicine  has been added to records !";
                                        unset($_SESSION['saved']);
                                        
                                    }
                                 ?>  
                        <div>
                    </div>
                </div>
            </div> 
        </div>
    </div>    


    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
