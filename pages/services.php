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
                            }
                        ?>
                    </p>
                    <h1 class="page-header">All Services</h1>
                </div>
                <div class="col-lg-6">
                    <a href="#" data-target="#login-modal" data-toggle="modal" role="button" class="btn btn-info btn-small pull-right" style="margin-top: 45px;"><i class="fa fa-plus"></i> Add Service</a>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->

            <!--Add patient fadding effect-->
            <div class="modal fade" id="login-modal">
                <div class="modal-dialog text-center">
                    <div class="modal-content">
                        <h3>Add Service</h3>
                        <div id="div-forms">
                            <form action="addservice.php" method="post" class="form-horizontal" enctype="multipart/form-data">  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="name" placeholder="Name of Service" required>
                                    </div> 
                                </div>  
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Category</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="category" required>
                                            <option value="Laboratory">Laboratory</option> 
                                            <option value="Services">Services</option>
                                            <option value="Pharmacy">Pharmacy</option>
                                            <option value="Utilities">Utilities</option> 
                                            <option value="Doctor's Fee">Doctor's Fee</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="description" placeholder="Description" required>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Price</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="price" placeholder="Price" required>
                                    </div> 
                                </div>
 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-alt btn-hover btn-primary" name="add_service">
                                        <span>Save</span>
                                        <i class="fa fa-save"></i>
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
                            $query="SELECT * FROM services";
                            $result=mysqli_query($conn, $query);

                            echo"<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>";

                                echo"<thead>";
                                    echo"<tr>";
                                        echo"<th>ID</th>
                                        <th>Name</th>
                                        <th>Catagory</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                        <th>Action</th>";
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
                                            <td class='text-center'><a href='editservice.php?a'><i class='fa fa-edit btn btn-lg btn-warning'> Edit</i></a></td>
                                            <td class='text-center'><a href='deleteservice.php?b'><i class='fa fa-trash btn btn-lg btn-danger'> Delete</i></a></td>";
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
