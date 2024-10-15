<?php
session_start();
// Your code here
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tekete Management System</title>
    <link rel="stylesheet" href="../../../public/assets/css/ticket_user/track_ticket_side_bar.css" />
    <link href="../../../public/assets/css/bootstrap-4.4.1.css"  rel="stylesheet" />
    <link href="../../../public/assets/css/track_ticket.css" rel="stylesheet" />
    <linkrel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    
  </head>

  <body>
    <!-- Topbar -->
    <nav  class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow topbr" style="z-index: 999999999; height: 40px" >
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"  style="margin-left: -5%">
        <i class="fa fa-bars"></i>
      </button>
      <button id="sidebarClose" class="btn btn-link d-md-none rounded-circle mr-3" style="display: none; margin-left: -5%">
        <i class="fa fa-close"></i>
      </button>

      <ul class="navbar-nav ml-auto" style="float: right">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <label style="color: blue">Full Name Here</label>&nbsp
            <i class="fa fa-user-circle icons" style="font-size: 20px; float: right; margin: 0 auto" ></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- End of Topbar -->

    <section id="demo" class="incident">
      <div class="sidebar" id="sideba">
        <div class="admin">
          <center>
            <img src="../../../public/assets/images/tekete.png" class="logo" alt="" />
          </center>

          <div class="items">
            <a style="font-size: 16px" href="../"
              ><i class="fa fa-envelope" aria-hidden="true"></i>Log a ticket</a
            >
          </div>
          <div class="items">
            <a style="font-size: 16px" href=""
              ><i class="fa fa-traffic-light" aria-hidden="true"></i>Track
              ticket</a
            >
          </div>
        </div>
      </div>

      <div class="sidebar5" id="side5" style="background: white; display: none">
        <div class="admin">
          <div class="items">
            <label class="label">
              <i class="fa fa-envelope" aria-hidden="true"></i>Email Here
            </label >
          </div>
          <div class="items">
            <label class="label">
              <i class="fa fa-phone" aria-hidden="true"></i>Phone Number Here
            </label>
          </div>
          <div class="items">
            <label class="label"
              ><i class="fa fa-building" aria-hidden="true"></i>Company Name Here</label >
          </div>
          <div class="items">
            <a style="font-size: 14px" href="../logoutest.php">
              <i class="fa fa-user-circle icons" aria-hidden="true"></i>logout</a>
          </div>
        </div>
      </div>

      <div class="incident-form"></div>

      <div class="mobile_form">
        <h1 class="title">Tekete Management System</h1>
        <div id="active">
          <div class="top-header">
            <h5 class="active-header">Active Tickets</h5>
            <h5 class="not_active">Completed Tickets</h5>
          </div>
        <?php

        include_once '../../../config/database.php';
        include_once '../../AppComponent/Models/databaseAPI.php';

        $databaseAPI = new DatabaseAPI($connectionObject);

        if (isset($_SESSION['email'])) {
          $email = $_SESSION['email'];
          $id = $databaseAPI->getUserIdByEmail($email); // Get user ID by email
        
          // Query to get the incidents for the logged-in user
          $sql = "SELECT * FROM incidents WHERE user_id='$id'";
          $results = mysqli_query($connection, $sql);

          // Check if the query was successful
          if ($results === false) {
            // Print the error message from MySQL
            echo "Error in query: " . mysqli_error($connection);
          } else {
            // If there are results, proceed
            if (mysqli_num_rows($results) > 0) {
              while ($row = mysqli_fetch_assoc($results)) {
                // if (strtoupper($row['status']) == 'ESCALATE') {
                echo '<div class="mobile_status">
                            <div class="mobileDiv">
                                <div class="status scroll">
                                    <h6>Ticket No :' . $row["date"] . $row["tick_id"] . '</h6>
                                    <h6>Department :' . $row["department"] . '</h6>
                                    <h6>Description :' . $row["description"] . '</h6>
                                </div>
                                <div class="">
                                    <div class="">
                                        <ul id="progressbar">
                                            <li class="step0 active" id="step1">LOGGED</li>
                                            <li class="step0 active text-center" id="step2">IN PROGRESS</li>
                                            <li class="step0 active text-muted text-right" id="step3">' . strtoupper($row['status']) . '</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>';
                //   }
                // Continue for other status conditions...
              }
            } else {
              // No tickets found
              echo '<div class="mobile_status">
                    <div class="mobileDiv">
                        <div style="text-align:center;margin-top:5%">
                            <h6>No Active Ticket Found</h6>
                        </div>
                    </div>
                </div>';
            }
          }
        } else {
          echo 'User is not logged in.';
        }
        ?>
          <div class="mobile_status">
            <div class="mobileDiv">
              <div class="status">
                <!-- <h6>No Active Ticket Found</h6> -->
              </div>
            </div>
          </div>
        </div>
        <div id="submted" style="display: none">
          <div class="top-header">
            <h5 class="not_active">Active Tickets</h5>
            <h5 class="active-header">Completed Tickets</h5>
          </div>
          <div class="mobile_status">
            <div class="mobileDiv">
              <div class="status">
                <h6>Ticket No : Date/TickID</h6>
                <h6>Department : Department Name</h6>
                <h6>Description : Ticket Description</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>

<script defer src="../../../../tekete-main/public/assets/js/User/track_ticket.js"></script>
<script defer  src="../../../../tekete-main/public/assets/js/toggle_menu.js"></script>

</html>

