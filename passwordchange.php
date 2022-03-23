<?php 
     include 'connection.php';
Session_start();

    $message="";
	 $ID=$_GET['key'];
	 $ids= "";
	 $sqll = mysqli_query($connection, "SELECT * FROM `users` WHERE `ID`='$ID'");
   $row = mysqli_fetch_assoc($sqll);
   $ids=$row['ID'];
	  if(isset($_POST['submit'])){
        $password=$_POST['password'];
	  $Confirmpassword=$_POST['Confirmpassword'];

		
	  $sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `ID`='$ids'");
   $rows = mysqli_fetch_assoc($sql);
     $email=$rows['Username'];
	 $ids=$rows['ID'];
   if($password !=$Confirmpassword)
   {
	   
	   $messag= '<div class="alert alert-danger alert-dismissable" style="margin-top:0px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Unsuccessful!</strong> Password Did not much!!!
                  </div>';
	   
   }
  else if(mysqli_num_rows($sql)>0 && $password ==$Confirmpassword)
    {
   $sqls = mysqli_query($connection, "update `users` set Password='$password' WHERE `ID`='$ids'");
    if($sqls==true){
$messag= '<div class="alert alert-danger alert-dismissable" style="margin-top:0px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Password reset complete.</strong> 
Your password has been reset. Sign in to your account.
                  </div>';
	}
	else {
		
		$messag= '<div class="alert alert-danger alert-dismissable" style="margin-top:0px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Unsuccessful!</strong>Error!!!."".
                  </div>';
		
	}
			} 
			else{
			$messag= '<div class="alert alert-danger alert-dismissable" style="margin-top:0px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Unsuccessful!</strong> '.$ids.' Emaild is Incorrect!!! 
                  </div>';
			}
	 
	 }
	

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Password Reset - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted"><?php if (!empty($_POST))echo $messag;?>Enter your Password and Confirm Password.</div>
                                        <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="password" name="password"  />
                                                <label for="inputEmail">Password</label>
                                            </div>
											  <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="password" name="Confirmpassword"  />
                                                <label for="inputEmail">Confirm Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="login.php">Return to login</a>
                                                <input type="submit" class="btn btn-primary" name="submit" value="Reset Password " />                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
