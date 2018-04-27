				<?php 
					session_start();
					include_once 'connection.php';
					if(isset($_POST['submit'])){ 
						$search=$_POST['search'];
						 mysqli_real_escape_string($conn,$search);

                            $sql="SELECT patient_id, name, birthday, gender, address, phone, img, email, room phone FROM `patients` WHERE name LIKE '%". $search ."%'";
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
                                echo"<tbody>";
                                    echo"<tr class='odd gradeX'>";
                                        echo"
                                            <td>".$row[0]."</td>
                                            <td>".$row[1]."</td>
                                            <td>".$row[2]."</td>
                                            <td>".$row[3]."</td>
                                            <td>".$row[4]."</td>
                                            <td>".$row[5]."</td>
                                            <td><img src='profile/".$row['6']."' class='img-responsive' /></td>
                                            <td>".$row[7]."</td>
                                            <td>".$row[8]."</td>";
                                    echo"</tr>";
                                echo"</tbody>";
                                }
                            echo"</table>";
                    }
                ?>