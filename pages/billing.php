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
                <div class="col-lg-6">
                    <p class="text-success">
                        <?php
                            if (isset($_SESSION['saved'])) {
                                echo $_SESSION['saved'];
                                unset( $_SESSION['error']);
                            }
                        ?>
                    </p>
                    <h1 class="page-header">All Bills</h1>
                </div>
                <div class="col-lg-6">
                    <a href="#" data-target="#login-modal" data-toggle="modal" role="button" class="btn btn-info btn-small pull-right" style="margin-top: 45px;"><i class="fa fa-plus"></i> All Bills</a>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->

            <!--Add patient fadding effect-->
            <div class="modal fade" id="login-modal">
                <div class="modal-dialog text-center">
                    <div class="modal-content">
                        <h3>Add Bill</h3>
                        <div id="div-forms">
                            <form action="add_billing.php" method="post" class="form-horizontal">
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Patient ID</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="patient_id" placeholder="Patient ID" required>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Patient Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="p_name" placeholder="Last name - First name - Middile initial" required>
                                    </div> 
                                </div>  
                                  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Check Up</label>
                                    <div class="col-sm-6">
                                       <input type="text" class="form-control" name="checkup" placeholder="Check Up" required> 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Collected By</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="collected" placeholder="Collected By" required>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-6">
                                        <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon">
                                            <i class="glyph-icon icon-calendar"></i>
                                        </span>
                                            <input type="date" name="date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Charges</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="charges" placeholder="Charges">
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Other Charges</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="ocharges" placeholder="Other Charges">
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Total Charges</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="t_charges" placeholder="Total Charges" required>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-alt btn-hover btn-primary" name="add_bill">
                                        <span>Make Bill</span>
                                        <i class="glyph-icon icon-arrow-right"></i>
                                    </button>  
                                </div>  
                            </form>  
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Bills
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <?php 
                        include_once 'connection.php';
                            $query="SELECT * FROM opd_billing";
                            $result=mysqli_query($conn, $query);

                            echo"<table width='100%' class='table table-striped table-bordered table-hover'>";

                                echo"<thead>";
                                    echo"<tr>";
                                        echo"<th>Appoint ID</th>
                                        <th>Patient ID</th>
                                        <th>Patient Name</th>
                                        <th>Check Up</th>
                                        <th>Collected By</th>
                                        <th>Date</th>
                                        <th>Total Charges</th>";
                                    echo"</tr>";
                                echo"</thead>";
                                while ($row=mysqli_fetch_array($result)) {                     
                                echo"<tbody>";
                                    echo"<tr class='odd gradeX'>";
                                        echo"
                                            <td>".$row[0]."</td>
                                            <td>".$row[1]."</td>
                                            <td>".$row[2]."</td>
                                            <td>".$row[3]."</td>
                                            <td>".$row[4]."</td>
                                            <td>".$row[5]."</td>
                                            <td>".$row[8]."</td>";
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
