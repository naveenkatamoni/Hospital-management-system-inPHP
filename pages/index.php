<?php 
session_start();
if (!isset($_SESSION['u']) AND !isset($_SESSION['p'])) {
    header("location:login.php");
}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>True Care | Home</title>


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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header text-primary"><i class="text-success fa fa-dashboard fa-2x"></i> Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bed fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
                                            include_once 'connection.php';
                                            $query="SELECT COUNT(patient_id)
                                            FROM patients";

                                            $result=mysqli_query($conn,$query);

                                                while($row=mysqli_fetch_array($result))
                                                {
                                                    echo $row[0];
                                                    $_SESSION['patients']=$row[0];
                                                }
                                             ?>
                                    </div>
                                    <div>Total Patients</div>
                                </div>
                            </div>
                        </div>
                        <a href="allpatients.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-stethoscope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
                                            include_once 'connection.php';
                                            $query="SELECT COUNT(doc_id)
                                            FROM physicians";

                                            $result=mysqli_query($conn,$query);

                                                while($row=mysqli_fetch_array($result))
                                                {
                                                    echo $row[0];
                                                    $_SESSION['physicians']=$row[0];
                                                }
                                             ?>
                                    </div>
                                    <div>Total Physicians</div>
                                </div>
                            </div>
                        </div>
                        <a href="physicians.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-briefcase fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            include_once 'connection.php';
                                            $query="SELECT COUNT(service_id)
                                            FROM services";

                                            $result=mysqli_query($conn,$query);

                                                while($row=mysqli_fetch_array($result))
                                                {
                                                    echo $row[0];
                                                    $_SESSION['services']=$row[0];
                                                }
                                        ?>
                                    </div>
                                    <div>Total services</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                            include_once 'connection.php';
                                            $query="SELECT COUNT(id)
                                            FROM orders";

                                            $result=mysqli_query($conn,$query);

                                                while($row=mysqli_fetch_array($result))
                                                {
                                                    echo $row[0];
                                                }
                                        ?>
                                    </div>
                                    <div>Total orders</div>
                                </div>
                            </div>
                        </div>
                        <a href="orders.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
            <div class="row">
                <div class="col-md-12">
                    <p class="text-white text-center">Designed and Developed By 
                        <a class="text-white" href="www.mhbhat.com">MAHMOOD HUSSAIN BHAT</a></p>
                </div>
            </div>
    </div>
    <!-- /#wrapper -->

    <?php 
    include_once 'connection.php';
    $chart_data='';
    $chart_data .="{Patients:'".$_SESSION["patients"]."', Physicians".$_SESSION["patients"].", Services".$_SESSION["patients"].", }";
    $chart_data=substr($chart_data, 0, -1)
     ?>

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

    <script type="text/javascript">
        Morris.bar({
            element : 'chart',
            data:[<?php echo $chart_data; ?>],
            xkey:'services',
            ykeys:['patients', 'physicians'],
            labels:['patients', 'physicians'];
            HideHover:'auto';
            stacked:true
        });
    </script>

</body>

</html>
