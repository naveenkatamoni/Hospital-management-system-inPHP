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
                    <h1 class="page-header">All Physicains</h1>
                </div>
                <div class="col-lg-6">
                    <a href="#" data-target="#login-modal" data-toggle="modal" role="button" class="btn btn-info btn-small pull-right" style="margin-top: 45px;"><i class="fa fa-plus"></i> Add Physicain</a>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->

            <!--Add patient fadding effect-->
            <div class="modal fade" id="login-modal">
                <div class="modal-dialog text-center">
                    <div class="modal-content">
                        <div id="div-forms">
                            <h3>
                                <?php
                                if (isset($_SESSION['saved'])) {
                                echo $_SESSION['saved'];
                                }
                                ?>
                            </h3>
                            <div><img src="logo.png"></div>
                            <form action="addphysician.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Picture</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="img" placeholder="Physician Picture" required>
                                    </div> 
                                </div>   
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" placeholder="Last name - First name - Middile initial" required>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Type</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="type" required>
                                          <option value="regular">Regular</option>
                                          <option value="Part Time">Part Time</option>
                                        </select>
                                    </div> 
                                </div>   

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                                    </div> 
                                </div> 

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Specialization</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="specialization" placeholder="Address" required>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Experience</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="experience" required>
                                          <option value="Less than 1 Year">Less than 1 year</option>
                                          <option value="1 Year">1 Year</option>
                                          <option value="2 Years">2 Years</option>
                                          <option value="3 Years">3 Years</option>
                                          <option value="4 Years">4 Years</option>
                                          <option value="5 Years or more">5 Years or more</option>
                                        </select>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Duty Time</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="duty" required>
                                          <option value="Morning">Morning</option>
                                          <option value="Noon">Noon</option>
                                          <option value="Evening">Evening</option>
                                          <option value="Night">Night</option>
                                        </select>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Off Day</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="offday" required>
                                          <option value="Sunday">Sunday</option>
                                          <option value="Monday">Monday</option>
                                          <option value="Tuesday">Tuesday</option>
                                          <option value="Wednesday">Wednesday</option>
                                          <option value="Thrusday">Thrusday</option>
                                          <option value="Friday">Friday</option>
                                          <option value="Saturday">Saturday</option>
                                        </select>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Registration Date</label>
                                    <div class="col-sm-6">
                                        <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon">
                                            <i class="glyph-icon icon-calendar"></i>
                                        </span>
                                            <input type="date" name="regdate" class="form-control" required>
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gender</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="gender" required>
                                            <option value="Male">Male</option> 
                                            <option value="Female">Female</option> 
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="phone" placeholder="Contact Number" required>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" name="email" placeholder="Email ID" required>
                                    </div> 
                                </div>
 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-alt btn-hover btn-primary" name="add_physician">
                                        <span>Save Physician Info</span>
                                        <i class="fa fa-arrow-right"></i>
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
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <?php 
                        include_once 'connection.php';
                            $query="SELECT * FROM physicians";
                            $result=mysqli_query($conn, $query);

                            echo"<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>";

                                echo"<thead>";
                                    echo"<tr>";
                                        echo"<th>Image</th>
                                        <th>Name</th>
                                        <th>Specialization</th>
                                        <th>Duty</th>
                                        <th>Off Day</th>
                                        <th>Phone</th>
                                        <th>Gmail</th>";
                                    echo"</tr>";
                                echo"</thead>";
                                while ($row=mysqli_fetch_array($result)) {                     
                                echo"<tbody>";
                                    echo"<tr class='odd gradeX'>";
                                        echo"
                                            <td><img src='physicians/".$row['1']."' class='img-responsive' /></td>
                                            <td>".$row[2]."</td>
                                            <td>".$row[5]."</td>
                                            <td>".$row[7]."</td>
                                            <td>".$row[8]."</td>
                                            <td>".$row[11]."</td>
                                            <td>".$row[12]."</td>";
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
