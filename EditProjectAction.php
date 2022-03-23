
<?php 
     include 'connection.php';
$id=$_GET['id'];
    session_start();
?>

<?php if(isset($_SESSION['username'])==true) {?>

<!DOCTYPE html>
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
		
		  <!-- live edit -->
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
  

<script type="text/javascript" src="jquery.tabledit.js"></script>
<script type="text/javascript" src="jquery.tabledit.min.js"></script>
		    <!-- Live edit end-->
		
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
                                    <a class="nav-link" href="addproject.php">Add New Project </a>
                                    <a class="nav-link" href="EditProject.php">Edit Project</a>
									<a class="nav-link" href="tables.php">View Project</a>
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
				 <div class="container-fluid px-4">
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
								<?php 
								$INSERTquerys="SELECT `Project_No` from sales_record where id='$id'";
	
	 $res2= mysqli_query($connection,$INSERTquerys);
	 $rowd = mysqli_fetch_assoc($res2);
	 $ids=$rowd['Project_No'];
								?>
                                 <a href="EditItem.php?id=<?php echo $ids?>" ><button type="button" name="add_data" id="add_data" class="btn btn-success btn-xs">Edit this Project Items </button></a>
      </div>
     
							    <div class="col-md-6" align="right">
                           </div>
                            <div class="card-body">
                                <table id="data_table"  class="table table-striped">
                                    <thead>
                                        <tr>
										<th>ID</th>
										<th>Project Number</th>
                                            <th>RFQ</th>
                                            <th>Quotation Status</th>
                                            <th>Contract Status</th>
                                            <th>Contract Signed Date</th>
                                            <th>Manufacturing</th>
											<th>Delivery Due Date</th>
											
											<th>Contract Amount</th>
											<th>Collected Amount</th>
											<th>Document Link</th>
											
											</tr>
											
											</thead>
											
											<tbody>
										
										<?php 
			$INSERTquery="SELECT `id`, `Project_No`, `RFQ`, `Quotation_Status`, `Contract_Status`, `Contract_Signed_Date`, `Manufacturing`, `Delivery_Due_Date`, `Contract_Amount`,
			`Collected_Amount`, `Document` FROM `sales_record` where id='$id'";
	
	 $res= mysqli_query($connection,$INSERTquery);
	 
	 
while($row = mysqli_fetch_assoc($res))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['Project_No'] . "</td>";
echo "<td>" . $row['RFQ'] . "</td>";
echo "<td>" . $row['Quotation_Status'] . "</td>";
echo "<td>" . $row['Contract_Status'] . "</td>";
echo "<td>" . $row['Contract_Signed_Date'] . "</td>";
echo "<td>" . $row['Manufacturing'] . "</td>";
echo "<td>" . $row['Delivery_Due_Date'] . "</td>";
echo "<td>" . $row['Contract_Amount'] . "</td>";
echo "<td>" . $row['Collected_Amount'] . "</td>";
echo "<td>" . $row['Document'] . "</td>";
echo "</tr>";
}
										?>
										
										
										
									
										</tbody>
										</table>
											</div>
											</div>
								</div>			
                </main>

			 <script type="text/javascript">
			 
			 $('#data_table').Tabledit({
    url: 'action.php',
    columns: {
        identifier: [0, 'id'],
        editable: [[1, 'Project_No'], [2, 'RFQ'], [3, 'Quotation_Status','{"1": "Black Widow", "2": "Captain America", "3": "Iron Man"}'], [4, 'Contract_Status'], [5, 'Contract_Signed_Date'],[6, 'Manufacturing'],[7, 'Delivery_Due_Date'],[8, 'Contract_Amount'],[9, 'Collected_Amount'],[10, 'Document']]

    }
});
</script>
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
