<?php 
     include 'connection.php';
Session_start();

    $message="";
	 $ID=$_GET['key'];
	
	  if(isset($_POST['submit'])){
        $password=$_POST['password'];
	  $Confirmpassword=$_POST['Confirmpassword'];

		
	  $sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `ID`='$ID'");
   $rows = mysqli_fetch_assoc($sql);
     $email=$rows['Username'];
   if($password !=$Confirmpassword)
   {
	   
	   $messag= '<div class="alert alert-danger alert-dismissable" style="margin-top:0px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Unsuccessful!</strong> Password Did not much!!!
                  </div>';
	   
   }
  else if(mysqli_num_rows($sql)>0 && $password ==$Confirmpassword)
    {
   $sqls = mysqli_query($connection, "update `users` set Password='$password' WHERE `ID`='$ID'");
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
                    <strong>Unsuccessful!</strong> '.$ID.' Email is Incorrect!!! 
                  </div>';
			}
	 
	 }
	

?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary" style="background-color:#fff;" >
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?php if (!empty($_POST))echo $messag;?>Login</h3>  </br> <h3 style="color: red;"><?php if (!empty($_POST))echo $error_message;?></h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name= "username" type="email" placeholder="name@Wodametal.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name= "Password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.php">Forgot Password?</a>
                                                <input type="submit" class="btn btn-primary" value="Login" name="submit"/>
                                            </div>
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
                            <div class="text-muted">Copyright &copy; Woda Metal Industry</div>
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
