<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="page-header">All Appointments</h1>
                </div>
                <div class="col-lg-4 page-header">
                    <form method="post">
                    <div class="input-group custom-search-form">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    </form>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Appointments
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <?php 
                        include_once 'connection.php';
                            

                       $query=" SELECT patients.patient_id, patients.name, add_appointment.date, add_appointment.disease, add_appointment.problems, add_appointment.symptoms, physicians.doc_id, physicians.name, add_medicine.medicine 
                            FROM patients INNER JOIN add_appointment ON 
                             patients.patient_id=add_appointment.patient_id INNER JOIN 
                             add_medicine ON patients.patient_id=add_medicine.patient_id
                             INNER JOIN 
                             physicians ON physicians.doc_id=add_medicine.doc_id";


                            $result=mysqli_query($conn, $query);

                            echo"<table width='100%' class='table table-striped table-bordered table-hover'>";

                                echo"<thead>";
                                    echo"<tr>";
                                        echo"
                                        <th>Patient ID</th>
                                        <th>Patient Name</th>
                                        <th>Checkup Date</th>
                                        <th>Disease</th>
                                        <th>Problems</th>
                                        <th>Doctor ID</th>
                                        <th>Doctor Name</th>
                                        <th>Symptoms</th>
                                        <th>Medicines Pescribed</th>";
                                    echo"</tr>";
                                echo"</thead>";
                                while ($row=mysqli_fetch_array($result)) {                     
                                echo"<tbody>";
                                    echo"<tr class='odd gradeX'>";
                                        echo"
                                            <td>".$row['patient_id']."</td>
                                            <td>".$row['name']."</td>
                                            <td>".$row['date']."</td>
                                            <td>".$row['disease']."</td>
                                            <td>".$row['problems']."</td>
                                            <td>".$row['doc_id']."</td>
                                            <td>".$row['name']."</td>
                                            <td>".$row['symptoms']."</td>
                                            <td>".$row['medicine']."</td>";
                                    echo"</tr>";
                                echo"</tbody>";
                                }
                            echo"</table>";
                             ?>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->    
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
