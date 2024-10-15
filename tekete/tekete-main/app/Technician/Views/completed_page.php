<?php

    require_once('../Controller/CompletionController.php');

    $controller = new CompletionController();
    $result = $controller->getCompletedTickets();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Completed</title>
    <!-- Bootstrap -->       
        <link rel="stylesheet" href="../../../public/assets/css/completepage.css">        
        <link rel="stylesheet" href="../../../public/assets/css/withoutSideBar.css"> 
        <link rel="stylesheet" href="../../../public/assets/css/style_2.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body style="background-color:rgb(102, 175, 204);">
  
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

</style>

 <!-- Modal -->
    <div id="detailModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Survey Results</h4>
            
          </div>
                <div class="modal-body">
                    
              </div>
          <div class="modal-footer">
            <button type="button" class="btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>

<section class="incident">

    <h1 class="title">Tekete Management System</h1>
        <div class="sidebar">
            <div class="admin ">

                <div style="text-align: center;">
                    <img src="../tekete.png" class="logo">
                </div>

            <div class="dropdown">
                    <a class="dropbtn" onclick="view('status')"><i class="fa fa-traffic-light" aria-hidden="true"></i>Status</a>
                        <div class="dropdown-content" id="status">
                            <a href="loggedTech.php"> <i class="fa fa-circle fa2" style="color: grey;"> </i>Logged   </a>
                            <div>
                            <a href="in-progressTech.php"><i class="fa fa-circle fa2" style="color: grey;" ></i >In-progress   </a>
                            </div>
                                <a href="escalation_page.php"> <i class="fa fa-circle fa2" style="color: grey;"> </i>Escalate </a>
                            <div>
                                <a href="completed_page.php"><i class="fa fa-circle fa3 " style="color: green;"></i>Completed</a>
                                </div>
                            </div>
                </div>
                <div class="items">
                        <a class="new" href = "../logoutest.php"/><i class="fa fa-user-circle" aria-hidden="true"> </i> logout. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
                </div>
            </div>
        </div>

<table class="center" width="90.5%">
        <tr>
            <th class="th">Ticket No</th>
            <th  class="th">Name</th>
            <th  class="th">Phone Number</th>
            <th class="th">Email</th>
            <th class="th">Priority</th>
            <th class="th">Technician</th>
            <th class="th">Survey</th>
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
                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')" data-toggle="modal" data-target="#detailModal" style="cursor:pointer"><?php echo htmlspecialchars($incident['priority']); ?></td>
                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')" data-toggle="modal" data-target="#detailModal" style="cursor:pointer"><?php echo htmlspecialchars($incident['tname']." ".$incident['tsurname']); ?></td>
                    <td class="clickablerow" onclick="rowclick('<?php echo htmlspecialchars($incident['tick_id']); ?>')" data-toggle="modal" data-target="#detailModal" style="cursor:pointer"><?php echo htmlspecialchars($incident['survey']); ?></td>
                </tr>
            <?php 
                }
            } else {
            ?>
                <tr>
                    <td colspan="8" style="text-align: center;">No Completed tickets found</td>
                </tr>
            <?php 
            }
            
            ?>
</table>
</section>

    <script src="../../../../tekete-main/public/assets/js/toggle_menu.js"></script>
    <script src="../../../public/assets/js/Technician/completed_page.js"></script>
</body>
</html>