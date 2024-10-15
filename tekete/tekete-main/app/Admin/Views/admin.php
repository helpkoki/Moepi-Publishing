

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator - Tekete Management System</title>
    
    <!-- External Stylesheets -->
     <link rel="stylesheet" href="../">
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../js/jAlert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
     <link rel="stylesheet" href="../../../public/assets/css/admin/admin.css">
    <!-- External Scripts -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="background-color:#f8f9fc;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="height:40px;">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" onclick="openSide()">
            <i class="fa fa-bars"></i>
        </button>
        <button id="sidebarClose" class="btn btn-link d-md-none rounded-circle mr-3" style="display:none;" onclick="openClose()">
            <i class="fa fa-close"></i>
        </button>
    </nav>

    <center>
        <h1 class="title">TEKETE MANAGEMENT SYSTEM</h1>
        
        <!-- Sidebar and Content Wrapper -->
        <div id="wrapper">
            <div class="sidebar" id="sideba2">
                <div class="admin">
                    <center><img src="../../../public/assets/images/tekete.png" class="logo"></center>
                    
                    <div class="items">
                        <a href="dashboard.php"><i class="fa fa-tachometer icons"></i> Dashboard</a>
                    </div>
                    <div class="items">
                        <a href=""><i class="fa fa-user-circle icons"></i> Admin</a>
                    </div>
                    <div class="items">
                        <a onclick="view('technician')" style="color:#5543ca;"><i class="fa fa-user-circle icons"></i> Technician</a>
                        <div class="dropdown-content" id="technician">
                            <a href="add-technician.php"><i class="fa fa-user-circle"></i> Add</a>
                            <a href="remove-technician.php"><i class="fa fa-user-circle"></i> Remove</a>
                        </div>
                    </div>
                    <div class="items">
                        <a onclick="view('company')" style="color:#5543ca;"><i class="fa fa-user-circle icons"></i> Company</a>
                        <div class="dropdown-content" id="company">
                            <a href="add-company.php"><i class="fa fa-user-circle"></i> Add</a>
                            <a href="remove-company.php"><i class="fa fa-user-circle"></i> Remove</a>
                        </div>
                    </div>
                    <div class="items">
                        <a onclick="view('status')" style="color:#5543ca;"><i class="fa fa-traffic-light icons"></i> Status</a>
                        <div class="dropdown-content" id="status">
                            <a href="logged.php"><i class="fa fa-circle fa1"></i> Logged</a>
                            <a href="in-progress.php"><i class="fa fa-circle fa2"></i> In-progress</a>
                            <a href="escalation.php"><i class="fa fa-circle fa2"></i> Escalate</a>
                            <a href="completed.php"><i class="fa fa-circle fa3"></i> Completed</a>
                        </div>
                    </div>
                    <div class="items">
                        <a href="logout.php"><i class="fa fa-user-circle icons"></i> Logout</a>
                    </div>
                </div>
            </div>

            <!-- Incident Form -->
            <div class="incident-form" style="background-color:#f8f9fc;">
                <table class="table">
                    <tr>
                        <td><label class="label" for="date">Date</label></td>
                        <td><input id="date" class="input-text" type="text"  value="<?php echo $user['date']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label class="label" for="name">Name</label></td>
                        <td><input id="name" class="input-text" type="text" value="<?php echo $user['last_name']." ".$user['first_name']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label class="label" for="phoneNo">Phone Number</label></td>
                        <td><input id="phoneNo" class="input-text" type="text"  value="<?php echo $user['mobile']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label class="label" for="email">Email</label></td>
                        <td><input id="email" class="input-text" type="email"  value="<?php echo $user['email']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label class="label" for="operating-system">Operating System</label></td>
                        <td><input id="operating_system" class="input-text" type="text"  value="<?php echo $user['os']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label class="label" for="department">Department</label></td>
                        <td><input id="department" class="input-text" type="text"  value="<?php echo $user['department']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label class="label" for="description">Description</label></td>
                        <td><input id="description" class="input-text" type="text"  value="<?php echo $user['description']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label class="label" for="attachment">Attachment</label></td>
                        <td>
                            <img id="myImage" src="<?php echo "../User/images/".$user['path']; ?>" alt="Attachment" onclick="openModal()">
                            <div id="myModal" class="modal">
                                <span class="close" id="closeModal">&times;</span>
                                <img class="modal-content" id="modalImage" src="<?php echo "../User/images/".$user['path']; ?>" alt="Attachment">
                                <div id="caption"></div>
                            </div>
                        </td>
                    </tr>
                </table>

                <!-- Admin Form -->
                <h2>Administrator</h2>
                <form  class="AdminModel   " action="adminController.php" method="post">
                    <table class="table" style="background-color:#f8f9fc;">
                        <tr>
                            <td><label class="label" for="ticket_no">Ticket No:</label></td>
                            <td>
                                <input name="ticket_no" class="input-text" type="text" readonly value="<?php echo 'TickNo-'.$user['date'].'-'.$user['tick_id']; ?>">
                                <input name="tickno" type="hidden" value="<?php echo $user['tick_id']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label class="label" for="status">Status</label></td>
                            <td>
                                <input type="radio" id="logged" name="status" value="logged"> Logged
                                <input type="radio" id="in-progress" name="status" value="in-progress"> In-progress
                                <input type="radio" id="completed" name="status" value="completed"> Completed
                            </td>
                        </tr>
                        <tr>
                            <td><label class="label" for="priority">Priority</label></td>
                            <td>
                                <input type="radio" id="low" name="priority" value="Low"> Low
                                <input type="radio" id="medium" name="priority" value="Medium"> Medium
                                <input type="radio" id="high" name="priority" value="High"> High
                                <input type="radio" id="critical" name="priority" value="Critical"> Critical
                            </td>
                        </tr>
                        <tr>
                            <td><label class="label" for="technician">Assigned Technician</label></td>
                            <td>
                                <select name="technician" id="tech" class="select_tech">
                                    <option value="" disabled selected>Select Technician</option>
                                    <?php
                                        $resultT = mysqli_query($connection, "SELECT * FROM technician");
                                        if (mysqli_num_rows($resultT) > 0) {
                                            foreach ($resultT as $name) {
                                                echo "<option value='".$name['technician_id']."'>".$name['last_name']." ".$name['first_name']."</option>";
                                            }
                                        } else {
                                            echo "<option>No Data found!</option>";
                                        }
                                    ?>
                                </select></td>
		</tr>
		
		<tr> 
		  <?php if($rows[3]!='Sub'){?> <td> <input class="submit_btn" name="register" type="submit" value="Register"> </td>	<?php }?>		
	       <td><div style="display:flex;" class="submit_btn"><p <?php if($page==1){ echo '  style="color:#898989"';} else {echo 'onclick="prev()"';}?> class="prev" >&laquo; Prev</p><p  <?php if($myrow[0]<2){ echo 'style="color:#898989"';}else if($myrow[0]==$page){echo 'disabled  style="color:#898989"';} else {echo 'onclick="next()"';}?>  class="next">Next &raquo;</p></div></td>		
		</tr>
		<tr>
		    <td>
		    </td>
		</tr>
        
	</table>
</form>
                </form>
            </div>
        </div>
    </center>
	</div>
</div>
</section>

<!-- This Script toggle the menu for small screen devices of the size() -->
<script defer src="../../../../tekete-main/public/assets/js/toggle_menu.js"></script>
<script defer src="../../../../tekete-main/public/assets/js/Admin/admin.js"></script>
    

</body>
</html>
