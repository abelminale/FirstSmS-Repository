<?php 
     include 'connection.php';
	 Session_start();
	 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
    $message="";
	 
	  if(isset($_POST['submit'])){
        $email=$_POST['email'];
	 
	 
	 
	  $sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `Username`='$email'");
   $rows = mysqli_fetch_assoc($sql);
   $id=$rows['ID'];
   if(mysqli_num_rows($sql)>0)
    {
   
     $mail = new PHPMailer(true);

   $mail->SMTPDebug = false;// Enable verbose debug output
$mail->do_debug = 0;
                  
$mail->isSMTP();                        // Set mailer to use SMTP
$mail->Host       = 'mail.wodametal.com;';    // Specify main SMTP server
$mail->SMTPAuth   = true;               // Enable SMTP authentication
$mail->Username   = 'salesmgtsystem@wodametal.com';     // SMTP username
$mail->Password   = 'Woda@metal';         // SMTP password
$mail->SMTPSecure = 'ssl';              // Enable TLS encryption, 'ssl' also accepted
$mail->Port       = 465;  
			 $subject = 'Woda Sales Managment System Password Reset';
		$message = '<html><body>';
$message .= '<img src="//css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Website Change Request" />';
$message .= 'You are receiving this e-mail because you requested a password reset for your user account   ';
			 $mail->setFrom('salesmgtsystem@wodametal.com', 'From Sales Managment');           // Set sender of the mail
         // Add a recipient
$url="https://localhost/passwordchange.php?id=$id";
$subject = 'Woda Sales Managment System';

$mail->addCustomHeader('MIME-Version: 1.0');
$mail->addCustomHeader('Content-Type: text/html; charset=ISO-8859-1\r\n');
	$message= "<a href='http://localhost/sms/passwordchange.php?key=".$id."'>Click To Reset password</a>";
$mail->isHTML(true);                                  
$mail->Subject = $subject;
$mail->Body =$message;
$mail->addAddress($email, "Dear User");
$mail->send();
$messag= '<div class="alert alert-danger alert-dismissable" style="margin-top:0px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Successful!</strong> We sent an email to '.$email.' with instructions to reset your password.
                  </div>';
			} 
			else{
			$messag= '<div class="alert alert-danger alert-dismissable" style="margin-top:0px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Unsuccessful!</strong> Email is Incorrect!!!
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted"><?php if (!empty($_POST))echo $messag;?>Enter your email address and we will send you a link to reset your password.</div>
                                        <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@wodametal.com" />
                                                <label for="inputEmail">Email address</label>
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
