<?php

    require_once('../Controller/EscalationController.php');

    $controller = new EscalationController();
    $result = $controller->getEscalatedTickets();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Escalation</title>
    <!-- Bootstrap -->
            
            <link rel="stylesheet" href="../../../public/assets/css/escalate.css">
			<link rel="stylesheet" href="css/bootstrap-4.4.1.css" >
			<link rel="stylesheet" href="../../../public/assets/css/escalate.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

				
  </head>
  <body style="background-color:#f8f9fc;">
  
<!-- Topbar -->
                
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="z-index:9999999;height:40px;margin-left:250px">
 
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" onclick="openSide()">
        <i class="fa fa-bars" hi></i>
    </button>
    <button id="sidebarClose" class="btn btn-link d-md-none rounded-circle mr-3" onclick="openClose()" style="display:none">
        <i class="fa fa-close" hi></i>
    </button>
                    
</nav>

<!-- End of Topbar -->
                 
<section class="incident">
    <h1 class="title">Tekete Management System</h1>

    <div class="sidebar1" >
        <div class="admin ">

            <div style="text-align: center;">
                <img src="../tekete.png" class="logo">
            </div>

            <div class="items">
                <a class="" onclick="view('status')" style="color:#5543ca;"><i class="fa fa-traffic-light icons" aria-hidden="true" ></i>Status</a>

                    <div class="dropdown-content" id="status">
                        <a href="loggedTech.php"> <i class="fa fa-circle fa2"> </i>Logged   </a>
                        <a href="in-progressTech.php"> <i class="fa fa-circle fa2"> </i>In-progress     </a>
                        <a href="escalation_page.php"> <i class="fa fa-circle fa2"> </i>Escalate    </a>
                        <a href="completed_page.php"> <i class="fa fa-circle fa3"> </i>Completed</a>
                    </div>

            </div>
            
            <div class="items">
                <a class="new" href = "../LogOut.php"/><i class="fa fa-user-circle icons" aria-hidden="true" > </i>logout</a>
            </div>
                    
        </div>
    </div>

        <table class="center" width="90.5%">
            <tr>
                <th class="th">Ticket No</th>
                <th class="th">Name</th>
                <th class="th">Phone Number</th>
                <th class="th">Email</th>
                <th class="th">Operating System</th>
                <th class="th">Status</th>
                <th class="th">Priority</th>
                <th class="th">Technician</th>
            </tr>

            <?php 
            if ($result && is_array($result) && count($result) > 0) {
                foreach ($result as $incident) {
            ?>
                <tr>
                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')" data-toggle="modal" data-target="#detailModal" style="cursor:pointer"> <?php echo htmlspecialchars($incident['date']."-".$incident['tick_id']); ?></td>
                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')" data-toggle="modal" data-target="#detailModal" style="cursor:pointer"><?php echo htmlspecialchars($incident['fname']." ".$incident['lname']); ?> </td>
                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')" data-toggle="modal" data-target="#detailModal" style="cursor:pointer"><?php echo htmlspecialchars($incident['mobile']); ?></td>
                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')" data-toggle="modal" data-target="#detailModal" style="cursor:pointer"><?php echo htmlspecialchars($incident['email']); ?></td>
                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')" data-toggle="modal" data-target="#detailModal" style="cursor:pointer"><?php echo htmlspecialchars($incident['os']); ?></td>
                    
                    <td>
                        <select name="status" class="input-text" id="status" 
                            onchange="updateStatus(this.value, 
                                '<?php echo htmlspecialchars($incident['tick_id']); ?>', 
                                '<?php echo htmlspecialchars($incident['email']); ?>', 
                                '<?php echo htmlspecialchars($incident['date']); ?>', 
                                '<?php echo htmlspecialchars($incident['technician_id']); ?>')">
                            <option value="<?php echo htmlspecialchars($incident['status']); ?>"><?php echo htmlspecialchars($incident['status']); ?></option>
                            <option value="Completed">Completed</option>
                        </select>
                    </td>

                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')"  data-toggle="modal" data-target="#detailModal" style="cursor:pointer"><?php echo htmlspecialchars($incident['priority']); ?></td>
                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')" data-toggle="modal" data-target="#detailModal" style="cursor:pointer"><?php echo htmlspecialchars($incident['tname']." ".$incident['tsurname']); ?></td>
                </tr>
            <?php 
                }
            } else {
            ?>
                <tr>
                    <td colspan="8" style="text-align: center;">No escalated tickets found</td>
                </tr>
            <?php 
            }

            ?>
        </table>
    </section>
    
    


<div id="selectModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Assign</h4>
            <img src="tekete.png" class="modal-logo">
          </div>
                <div class="modal-body">
                    
                    
              </div>

              </div>
    
      </div>
    </div>
    
        
    <!-- Modal -->
    <div id="detailModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Full Details</h4>
            <img src="tekete.png" class="modal-logo">
          </div>
                <div class="modal-body">
                    
              </div>
          <div class="modal-footer">
            <button type="button" class="btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>
    <script defer src="../../../../tekete-main/public/assets/js/toggle_menu.js"></script>
    <script defer src="../../../public/assets/js/Technician/escalation_page.js"></script>
</body>
</html>