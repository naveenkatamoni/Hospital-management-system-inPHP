<?php 
	if (isset($_POST['login'])) {
		if ( !empty($_POST['username']) AND !empty($_POST['password']) ) {
			$user=$_POST['username'];
			$pass=$_POST['password'];

			$query="select * form user where username='$user'";
			$result=mysqli_query($con,$query);
			if($pass==$result['password']) {
				$_SESSION['user']=$user;
                $_SESSION['pass']=$pass;
                header("location:index.html");
			}

			else {
				$_SESSION['error'] = "Sorry, the details entered by you are Incorrect!";
                header("Location:login.html");
                exit();
			}

		}

		else {
			    $_SESSION['invalid'] = "Invalid Administrator!";
                header("Location:index.php");
                exit();
        }
			
	}

 ?>