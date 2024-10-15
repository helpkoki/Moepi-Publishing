<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Administrator</title>
    <!-- Bootstrap -->
    
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	
    <link rel="stylesheet" href="css/style.css" >
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	  <link href="/css/all.min.css" rel="stylesheet" >
	  
	  
  </head>
  <body style="background-color:#f8f9fc;">

                  <!-- Topbar -->
                
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="z-index:9999999;height:40px;margin-left:250px">
 


                   <p class="cname"></p>
                    
                </nav>	

 <!-- <center>  -->

 <!-- Topbar -->
                
               
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow topbr" style="height:40px">
 
                    <!-- Sidebar Toggle (Topbar) -->
                    <div >
                      <div style="width:100%;display:flex">
                       <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"  style="margin-left:0px" onclick="openSide()">
                          <i class="fa fa-bars" hi></i>
                       </button>
                       <button id="sidebarClose" class="btn btn-link d-md-none rounded-circle mr-3" onclick="openClose()" style="display:none">
                          <i class="fa fa-close" hi></i>
                       </button>
                       <div><p class="cname"></p></div>
                    </div>
                    </div>
                    <!-- Topbar Search -->
                    
 
 
                     <!-- Topbar Navbar -->
                    

                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow" onclick="print">
                            <a class="nav-link dropdown-toggle"  id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-print fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                    
                </nav>
                <!-- End of Topbar -->


<h1 class="title">Tekete Management System</h1>
<!-- body code goes here -->
<section class="incident" >

 

<div id="wrapper">
    <!-- side bar starts here -->

    <div class="sidebar" id="sideba2">
        <div class="admin ">
	   <!-- <center>
			    <img src="../tekete.png" class="logo">
			</center> -->
<!-- New -->
                    <div class="items"> 
                        <a class="" href="dashboard.php "><i class="fa fa-tachometer icons" aria-hidden="true" > </i>Dashboard</a>
                    </div>
                    <div class="items"> 
                        <a class="" href="admin.php"> <i class="fa fa-user-circle icons" aria-hidden="true" ></i>Admin</a>
                    </div>
                    <div class="items">
                        <a class="" onclick="view('technician')" style="color:#5543ca;"> <i class="fa fa-user-circle icons" aria-hidden="true" ></i>Technician</a>
                           <div class="dropdown-content"  id="technician">
                            <a href="add_technician.php"> <i class="fa fa-user-circle"> </i>Add</a>
                            <a href="remove_technician.php"> <i class="fa fa-user-circle"> </i>Remove 	</a>
                          </div>
                    </div>
					<div class="items">
                        <a class="" onclick="view('company')" style="color:#5543ca;"> <i class="fa fa-user-circle icons" aria-hidden="true" ></i>Company</a>
                           <div class="dropdown-content"  id="company">
                            <a href="add_company.php"> <i class="fa fa-user-circle"> </i>Add</a>
                            <a href="remove_company.php"> <i class="fa fa-user-circle"> </i>Remove 	</a>
                          </div>
                    </div>
                    <div class="items">
                        <a class="" onclick="view('status')" style="color:#5543ca;"><i class="fa fa-traffic-light icons" aria-hidden="true" ></i>Status</a>
                    <div class="dropdown-content" id="status">
                        <a href="logged.php "> <i class="fa fa-circle fa1"> </i>Logged</a>
                        <a href="in_progress.php"> <i class="fa fa-circle fa2"> </i>In-progress 	</a>
                        <a href="completed.php"> <i class="fa fa-circle fa3"> </i>Completed</a>
                    </div>
                    </div>
                    <div class="items">
                        <a class="new" href = "login_page.php"/><i class="fa fa-user-circle icons" aria-hidden="true" > </i>logout</a>
                    </div>
                    
                    </div>
                    </div>
    <div class= "incident-form " style="background-color:#f8f9fc;">

		
	    <h3 class="add">Add Technician</h3>  
	    	
		<div class="mydiv">
	
		<form class="myform" name="frm" action="../Controller/addTechnicianController.php" method="post">

		    <table class="table">
		        <tr>
                    <td style="vertical-align:middle" class="label">Name:</td>
				    <td><input class="input-text" type="text" name="name" placeholder="Name"></td>
				</tr>
				<tr>
                    <td style="vertical-align:middle" class="label">Surname:</td>
				    <td><input class="input-text" type="text" name="surname" placeholder="Surname"></td>
				</tr>
				<tr>
				    <td style="vertical-align:middle" class="label">Email:</td>
				    <td><input class="input-text" type= "email" name="emailAddress" placeholder="exmaple@exmple.com"></td>
				</tr>
				<tr>
				    <td style="vertical-align:middle" class="label">Cell No:</td>
				    <td><input class="input-text" type="text" name="cellNo" placeholder="Cell Number" pattern="[0-9]{10}"></td>
				</tr>
				<tr>
				    <td style="vertical-align:middle" class="label">Support Level:</td>
				    <td><select class="input-text" name="level" id="slevel" placeholder="Select level">
				        <option value="0">Select Level</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select></td>
		        </tr>
		        <td>
		            <!--<td><input class="submit_btn" type="submit" value="Submit" name="add"></td>-->
                    <td><button type="submit">Submit</button></td>
		            <td><input class="submit_btn" type="reset" value="Clear" name="clear"></td>
		        </tr>
		    </table>    
		</form>
	
	</div>
	</div>
	
</section>
    
<!-- This Script toggle the menu for small screen devices of the size() -->
<script defer src="../../../../tekete-main/public/assets/js/toggle_menu.js"></script>

</body>
</html>
