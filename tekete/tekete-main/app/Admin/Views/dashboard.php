<<<<<<< HEAD
=======
<head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TEKETE DASHBOARD</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
          
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <!--link href="css/sb-admin-2.css" rel="stylesheet">
	  <link href="css/all.min.css" rel="stylesheet" >
	  <link href="css/bootstrap-4.4.1.css" rel="stylesheet"
  -->
</head>

<body id="page-top" onclick="" onload="">

    <!-- Page Wrapper -->

    <div id="wrapper">

        
  	   <div class="sidebar_2" id="sideba">
			<div class="admin ">
				<center>
			    <img src="../tekete.png" class="logo">
			</center>
                
				<div class="items">
				    <a class="new" href="dashboard.php "> <i class="fas fa-fw fa-tachometer" aria-hidden="true"></i> &nbsp;&nbsp;Dashboard  &nbsp;</a>
					<a class="new" href="admin.php">
					<i class="fa fa-user-circle" aria-hidden="true"></i>Admin</a>
				</div>
				
				<div class="items">
                    <a class="dropbtn"style="text-decoration:none" onclick="view('technician')"> <i class="fa fa-user-circle" aria-hidden="true"></i>Technician&nbsp; &nbsp; &nbsp;</a>
                    <div class="dropdown-content" id="technician">
                    <a href="add_technician.php"> <i class="fa fa-user-circle"> </i>Add	 &nbsp; &nbsp; &nbsp;</a>
                    <a href="remove_technician.php"> <i class="fa fa-user-circle"> </i>Remove 	</a>
                    </div>
                </div>
					<div class="items">
                        <a class="" onclick="view('companys')" style="color:#5543ca;"> <i class="fa fa-user-circle icons" aria-hidden="true" ></i>Company</a>
                           <div class="dropdown-content"  id="companys">
                            <a href="add_company.php"> <i class="fa fa-user-circle"> </i>Add</a>
                            <a href="remove_company.php"> <i class="fa fa-user-circle"> </i>Remove 	</a>
                          </div>
                    </div>
				 

					<div class="items">
						<a a class="dropbtn"style="text-decoration:none" onclick="view('status')"><i class="fa fa-traffic-light" aria-hidden="true"></i>Status</a>
							<div class="dropdown-content" id="status">
								<a href="logged.php "><i class="fa fa-circle fa1"></i>Logged	&nbsp;	&nbsp;</a>
								<a href="in_progress.php"><i class="fa fa-circle fa2"></i>In-progress 	</a>
								<a href="escalation.php"> <i class="fa fa-circle fa2"> </i>Escalate	</a>
								<a href="completed.php"><i class="fa fa-circle fa3"></i>Completed</a>
							</div>
					</div>
					
				<div class="items">
                    <a class="new" href = "login_page.php"/><i class="fa fa-user-circle" aria-hidden="true"> </i>logout. &nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
			</div>
		</div>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column body" style="">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="z-index:99999999999;height:40px">
 
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" onclick="openSide()">
                        <i class="fa fa-bars" hi></i>
                    </button>
                    <button id="sidebarClose" class="btn btn-link d-md-none rounded-circle mr-3" onclick="openClose()" style="display:none">
                        <i class="fa fa-close" hi></i>
                    </button>


                   <a class="cname" style=""></a>
 

  

                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow" onclick="print()">
                            <a class="nav-link dropdown-toggle"  id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-print fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                    
                </nav>
                <!-- End of Topbar -->
                
                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="margin-top:4%">
                        <h1 class="h3  text-800">TEKETE MANAGEMENT DASHBOARD</h1>
                    <div class="d-sm-flex align-items-center" style="margin-top:-0.5%">    
                 
                    <!-- Topbar Navbar -->
                      <div class="form-group" >
					   <label>Company</label>
                       <select class="" aria-label="Filter" style="" name="company" id="company"  onchange="company()">
                              <option selected  style="font-size:16px" value=" "></option>
							  
                      </select> 
					  </div>
 
                     <div class="form-group" onclick='openDrop()' onclick="openDrop()">
					   <label>Tickets From</label>
                       <select class="" aria-label="Filter" style="" id="filterValue" onchange="fill()" onclick="fill()">
                              <option selected style="font-size:16px"></option>
                              <option value="1"  style="font-size:16px">Today</option>
                              <option value="2"  style="font-size:16px">This Week</option>
                              <option value="3"  style="font-size:16px">This Month</option>
                              <option value="4"  style="font-size:16px">This Year</option>
                              <option value="5"  style="font-size:16px">Last Year</option>
                              <option value="6"  style="font-size:16px">Custom</option>
                      </select> 
					</div>
                    </div>
				    <div class="popup" id="popup"style="display:none">
					<div style="" class="fill" id="fill">
                                From: <input type="date" id="start" name="trip-start"
                        value="2020-01-01"
                        min="2020-01-01" max="" class="custome_b" style="font-size:12px;" onchange="getData()">
						
                    <br>To: <input type="date" id="end" name="trip-start"
                        value=""
                        min="2020-01-01" max="" class="custome_b" style="font-size:12px;" onchange="getData()">
				    </div>
                    </div>
					</div>
   
						
                    <!-- Content Row -->
                    <div class="row" id="display">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Active Incidents</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" onclick="redirect('logged.php')" style="cursor:pointer">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Logged</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
						
						<!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" onclick="redirect('in-progress.php')" style="cursor:pointer">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                In-progress</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" onclick="redirect('escalation.php')"  style="cursor:pointer">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Escalated</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4" onclick="redirect('completed.php')"  style="cursor:pointer">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Completed</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

  

                    <!-- Content Row -->
                    <div class="row ">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4"  id='incident' >

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4" style="height:100%" >
                                <div class="card-header py-3" style="display:flex;width:100%">
                                    <h6 class="m-0 font-weight-bold text-primary" style="width:50%">INCIDENT TYPES</h6>
                                      <div class="tab" style="display:none" >
                            
                                       <div title="From "><button class="tablinks text-primary" onclick="openIncident(event, 'weekly')">This Week</button></div> 
                                       <div title="All"><button class="tablinks  text-primary " onclick="openIncident(event, 'all')" id="all_clic">All</button></div>
                                        
                                    </div>
                                </div>

								<div class="card-body tabcontent" style="background-color: #fff;"  id="all">
                                    <h4 class="small font-weight-bold" >Forgotten password <span
                                            class="float-right">0%</span></h4>
                                    <div class="progress mb-4 cursor"  style="height:20px;"  title="0">
                                        <div class="progress-bar bg-danger " role="progressbar" style="width:0%;"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" ></div>
                                    </div>
                                    
									
                                    <h4 class="small font-weight-bold">Slow Performance <span
                                            class="float-right">0%</span></h4>
                                    <div class="progress mb-4 cursor" style="height:20px" onclick="click()" title="0">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width:0%;"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  
									
                                    <h4 class="small font-weight-bold">USB unrecognised <span
                                            class="float-right">0%</span></h4>
                                    <div class="progress mb-4 cursor" style="height:20px" title="0">
                                        <div class="progress-bar" role="progressbar" style="width: 0%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                   
									
                                    <h4 class="small font-weight-bold">Computer Randomly Shutdown <span
                                            class="float-right">0%</span></h4>
                                    <div class="progress mb-4 cursor" style="height:20px" title="0">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 0%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
									
                                    <h4 class="small font-weight-bold">Network Problem <span
                                            class="float-right">0%</span></h4>
                                    <div class="progress mb-4 cursor" style="height:20px" title="0">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 0%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
									
									<h4 class="small font-weight-bold">Other <span
                                            class="float-right">0%</span></h4>
                                    <div class="progress mb-4 cursor" style="height:20px" title="0">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:0%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                
                     <!--FETCH BY WEEKLY-->
                    
                                
                                
                                
                                
                            </div>
                




                            
                            
                        </div>
                        
                        <div class="col-lg-6 mb-2">
                             <div class="card shadow mb-4" id="rePie">
                            
                             </div> 
                         

                            <div id="calendar-wrapper"    class="card  shadow mb-2" style="margin-top:-3%;width:100%"></div>
                             
                        </div>
                    
                        
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <div id="print" hidden></div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Moepi Publishing 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <!--
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    
<!-- This Script toggle the menu for small screen devices of the size() -->
<script src="../../../public/assets/js/toggle_menu.js"></script>

<script src="../../../public/assets/js/Admin/dashboard.js"></script>
</body>

</html>


>>>>>>> 04cba370943a2bb09ac1de01e606e4e2a2d6845e
