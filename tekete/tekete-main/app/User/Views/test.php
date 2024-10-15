<?php

include_once '../../../config/database.php';
include_once '../../AppComponent/Models/databaseAPI.php';

$databaseAPI = new DatabaseAPI($connectionObject);

 //if (isset($_SESSION['email'])) {
   // $email = $_SESSION['email'];
    $email = "koketsomopai@outlook.com";
   $id = $databaseAPI->getUserIdByEmail($email); // Get user ID by email
    echo $email;
    echo "<br>";
    echo $id;
    // Query to get the incidents for the logged-in user
    $sql = "SELECT * FROM incidents WHERE user_id='$id'";
    $results = mysqli_query($connection, $sql);

       echo "<br> checking the type of result <br>" ;
       $incidents = $results === false;
       var_dump($results);
      //  echo $results;

      echo " end <br>";
        print_r( mysqli_fetch_assoc($results));
     echo mysqli_num_rows($results);
    // Check if the query was successful
    if ($results) {
        // Print the error message from MySQL
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo "<br><br> row of info";
            print_r($row);
          //  if (strtoupper($row['status']) == 'ESCALATE') {
                echo '<div class="mobile_status">
                            <div class="mobileDiv">
                                <div class="status scroll">
                                    <h6>Ticket No :' . $row["tickno"] . $row["id"] . '</h6>
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
            //}
            // Continue for other status conditions...
        }
    } else {
        // No tickets found
        echo '<div class="mobile_status">
                    <div class="mobileDiv">
                        <div style="text-align:center;margin-top:5%">
                            <h6>No Active Ticket Found koketso</h6>
                        </div>
                    </div>
                </div>';
    }
        
    } else {
        // If there are results, proceed
    echo "Error in query: " . mysqli_error($connection);
    }
//} else {
  //  echo 'User is not logged in.';
//}
?>