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

    <!--Live Searching Script
<script language="javascript" type="text/javascript">
//Browser Support Code
function ajaxFunction(){
    var ajaxRequest;  // The variable that makes Ajax possible!
    
    try
    {
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    } catch (e)
    {
        // Internet Explorer Browsers
        try
        {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) 
        {
            try
            {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e){
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
    // Create a function that will receive data sent from the server
    ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
            document.myForm.time.value = ajaxRequest.responseText;
        }
    }
    var search = document.getElementById('search').value;

    var queryString = "?a=" + search;
    ajaxRequest.open("GET","livesearch.php"+queryString,true);
    ajaxRequest.send(null);

}

</script>
-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include_once 'nav.php'; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="page-header">All Patients</h1>
                </div>
                <!-- /.col-lg-8 -->
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
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="txtHint">

                        <?php
                        include_once 'connection.php';
                            if(isset($_POST['submit'])){ 
                                $search=$_POST['search'];
                                 mysqli_real_escape_string($conn,$search);

                                    $sql="SELECT patient_id, name, birthday, gender, address, phone, img, email, room phone FROM `patients` WHERE  name LIKE '%". $search ."%'";
                                    $result=mysqli_query($conn, $sql);

                                    echo"<table width='100%' class='table table-striped table-bordered table-hover'>";

                                echo"<thead>";
                                    echo"<tr>";
                                        echo"<th>ID</th>
                                        <th>Name</th>
                                        <th>Birthday(s)</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>image</th>
                                        <th>Email</th>
                                        <th>Room</th>";
                                    echo"</tr>";
                                echo"</thead>";
                                while ($row=mysqli_fetch_array($result)) { 
                                    if(!$row==0){
                                        echo"<tbody>";
                                    echo"<tr class='odd gradeX'>";
                                        echo"
                                            <td>".$row[0]."</td>
                                            <td>".$row[1]."</td>
                                            <td>".$row[2]."</td>
                                            <td>".$row[3]."</td>
                                            <td>".$row[4]."</td>
                                            <td>".$row[5]."</td>
                                            <td><img src='profile/".$row['6']."' class='img-responsive' width='30px' height='30px' /></td>
                                            <td>".$row[7]."</td>
                                            <td>".$row[8]."</td>";
                                    echo"</tr>";
                                echo"</tbody>";
                                    }                    
                                    else{
                                        echo"<tbody>";
                                    echo"<tr class='odd gradeX'>";
                                        echo"<td>No Records Found!</td>";
                                    echo"</tr>";
                                    echo"</tbody>";
                                    }
                                }
                            echo"</table>";
                            }elseif (!isset($_POST['submit'])){
                                $query="SELECT * FROM Patients";
                            $result=mysqli_query($conn, $query);

                            echo"<table width='100%' class='table table-striped table-bordered table-hover'>";

                                echo"<thead>";
                                    echo"<tr>";
                                        echo"<th>ID</th>
                                        <th>Name</th>
                                        <th>Birthday(s)</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>image</th>
                                        <th>Email</th>
                                        <th>Room</th>";
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
                                            <td><img src='profile/".$row['6']."' class='img-responsive' width='30px' height='30px' /></td>
                                            <td>".$row[7]."</td>
                                            <td>".$row[8]."</td>";
                                    echo"</tr>";
                                echo"</tbody>";
                                }
                            echo"</table>";
                            }
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
  

</body>

</html>
