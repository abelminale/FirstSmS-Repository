
<?php 
     include 'connection.php';

    session_start();
?>

<?php if(isset($_SESSION['username'])==true) {?>
<!DOCTYPE html>

<?php 
IF (isset($_POST['submit'])) 
{
$messag = "";

$PricingCoAmount = $_POST['PricingCoAmount'];
$ProjectNo = $_POST['ProjectNo'];
$PricingCAmount = $_POST['PricingCAmount'];
$DDueDate = $_POST['DDueDate'];
$Manufacturing = $_POST['Manufacturing'];
$ItemDesc = $_POST['ItemDesc'];
$qty = $_POST['qty'];
$ConStatus = $_POST['ConStatus'];
$ItemName = $_POST['ItemName'];
$CSignDate = $_POST['CSignDate'];
$QutaStatus = $_POST['QutaStatus'];
$RFQ = $_POST['RFQ'];
$UoM = $_POST['UoM'];
$atta = $_POST['atta'];


$insert1_query="INSERT INTO `sales_record`(`Project_No`, `RFQ`, `Quotation_Status`, `Contract_Status`, `Contract_Signed_Date`, `Manufacturing`, 
`Delivery_Due_Date`, `Contract_Amount`, `Collected_Amount`, `Document`)
 VALUES ('$ProjectNo','$RFQ', '$QutaStatus','$ConStatus','$CSignDate','$Manufacturing','$DDueDate',$PricingCAmount,$PricingCoAmount,'$atta')";

	
	$INSERTquery="INSERT INTO `item`(`Item_Name`, `Project_ID`, `UoM`, `Qty`, `Item_Description`)VALUES('$ItemName','$ProjectNo','$UoM',$qty,'$ItemDesc')";
	
	
	 $res= mysqli_query($connection,$insert1_query);
	  $res1= mysqli_query($connection,$INSERTquery);
	  
if(isset($_POST['ItemNameS'])) {
	  $number = count($_POST["ItemNameS"]);
	
	  
	  if($_POST["ItemNameS"] >0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
   
	$INSERTqueryss="INSERT INTO `item`(`Item_Name`, `Project_ID`, `UoM`, `Qty`, `Item_Description`)VALUES('".mysqli_real_escape_string($connection,$_POST["ItemNameS"][$i])."','".mysqli_real_escape_string($connection,$_POST["ProjectNo"])."' ,'".mysqli_real_escape_string($connection,$_POST["UoMS"][$i])."' ,'".mysqli_real_escape_string($connection,$_POST["qtyS"][$i])."', '".mysqli_real_escape_string($connection,$_POST["ItemDescS"][$i])."')";
$res12= mysqli_query($connection,$INSERTqueryss);



	  }
 }
}
	  if($res==true && $res1==true)
	  {
		
		   $messag= '<div class="alert alert-danger alert-dismissable" style="margin-top:0px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Successful!</strong> Project Has Been Added Successfully
                  </div>';
	  }
	   else {
         
		  $messag= '<div class="alert alert-danger alert-dismissable" style="margin-top:0px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Unsuccessful!</strong> Data Entry Unsuccessful.
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
        <title>Woda Sales Managment</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       
		  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style1.css"/>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Sales </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sales Project
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Add New Project </a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Edit Project</a>
									<a class="nav-link" href="layout-sidenav-light.html">View Project</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
		<div class="wizard-header">
									<h3 class="heading"><?php if (!empty($_POST))echo $messag;?></h3>
								</div>
		<div class="wizard-v7-content">
			<div class="wizard-form">
		        <form class="form-register"  name="add_name" id="add_name" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class="wizard-header">
								
								</div>
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>1</span></p>
			            	<div class="step-text">
			            		<span class="step-inner-1">Project</span>
			            		<span class="step-inner-2">Project Details</span>
			            	</div>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Project Stage</h3>
								</div>
							
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="your_email">Project Number</label>
										<input type="text" name="ProjectNo" id="your_email" class="form-control"  placeholder="CCCC" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="password">RFQ</label>
										<select  name="RFQ" id="password" class="form-control"  required>
										
										<option value="Received" >Received</option>
											<option value="On Going">On Going</option>
												<option value="NA">NA</option>
										</select>
										
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="confirm_password">Quotation status</label>
										<select  name="QutaStatus" id="password" class="form-control"  required>
										
										<option value="Issued" >Issued</option>
											<option value="On Going">On Going</option>
												<option value="Negotation">Negotation</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="confirm_password">Contract status</label>
										<select  name="ConStatus" id="password" class="form-control"  required>
										
										<option value="Signed" >Signed</option>
											<option value="On Going Negotation">On Going Negotation</option>
											
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="your_email">Contract Signed Date</label>
										<input type="date" name="CSignDate" id="" class="form-control"   required>
									</div>
								</div>
							</div>
			         </section>
					 
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>2</span></p>
			            	<div class="step-text">
			            		<span class="step-inner-1">Item Setup</span>
			            		<span class="step-inner-2">Item Details</span>
			            	</div>
			            </h2>
<section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Item Setup</h3>
								</div>
								<div class="form-row">
							
									<div class="form-holder form-holder-2">
										<label for="card_name">Item Name</label>
										<input type="text" name="ItemName" id="card_name" placeholder="Tower" class="form-control" required class="form-control name_list">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="card_number">UoM</label>
										<select  name="UoM" class="form-control name_list" id="password" class="form-control"  required>
										
										<option value="Received" >TONE</option>
											<option value="On Going">SET</option>
											<option value="On Going">PCs</option>
										</select>
									</div>
	

								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="cvc">Qty</label>
										<input type="number" name="qty" class="form-control name_list" id="cvc" class="form-control" required />
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="cvc">Attachment Link</label>
										<input type="text" class="form-control name_list" name="atta" id="cvc" class="form-control" required />
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="expiration">Item Description</label>
										<textarea name="ItemDesc" class="form-control name_list" placeholder="Steel Plate 
										50*100*MM Model" class="form-control" required>
										
										</textarea>
									</div>
									 
                                         
                                          
                               

									
							   									
								</div>
									<table class="table table-bordered" id="dynamic_field">  
                                    <tr><td><button type="button" name="add" id="add" class="btn btn-success">Add More Item</button></td></tr>
									
                               </table> 
							</div>
			        </section>
					
				
			            <!-- SECTION 3 -->
			            <h2>
			            	<p class="step-icon"><span>3</span></p>
			            	<div class="step-text">
			            		<span class="step-inner-1">Pricing & Manfacturing</span>
			            		<span class="step-inner-2">Pricing Amount</span>
			            	</div>
			            </h2>
			            	<section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Pricing Details</h3>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="cvc">Manufacturing</label>
										<select  name="Manufacturing" class="form-control"  required>
										
										<option value="On Process" >On Process</option>
											<option value="Done">Done</option>
											<option value="Planned to Start">Planned to Start</option>
										</select>
									</div>
									
								</div>
									<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="your_email">Delivery Due Date</label>
										<input type="date" name="DDueDate" id="" class="form-control"   required>
									</div>
								</div>
									<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="your_email">Pricing  Contract amount (ETB)</label>
										<input type="text" name="PricingCAmount" id="" class="form-control"   required>
									</div>
								</div>
							
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="your_email">Pricing  Collected amount (ETB)</label>
										<input type="text" name="PricingCoAmount" id="" class="form-control"   required>
									</div>
								</div>
								<div class="form-row">
							
								</div>
							</div>
								<input type="submit" name="submit" id="save" value="Save" class="btn btn-primary"   />
								  </form>
								  
								
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="ItemNameS[]" placeholder="Enter Item Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      
	  
	   $('#dynamic_field').append('<tr id="row'+i+'"><td><SELECT  name="UoMS[]"  class="form-control name_list" > <OPTION VALUE="">CHOOSE UoM</OPTION><OPTION VALUE="SET">SET</OPTION><OPTION VALUE="TON">TON</OPTION><OPTION VALUE="PCs">PCs</OPTION></SELECT></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      
 $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="number" name="qtyS[]" placeholder="Enter Item Quantity" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      
	   $('#dynamic_field').append('<tr id="row'+i+'"><td><textarea  name="ItemDescS[]"  class="form-control name_list" PLACEHOLDER="ADD ITEM DESCRIPTION" ></textarea></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      
	  });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"addprojectaction.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>
      
			            </section>
						
		        	</div>
		      
			</div>
		
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/main.js"></script>
	<script src="js/scriptadd.js"></script>
                </main>
				   
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
		
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
	<?php } else { header('Location:login.php');}?>
</html>
