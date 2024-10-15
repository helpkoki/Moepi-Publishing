<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    


    <title>Tekete Management System</title>
    <link href="../../../public/assets/css/bootstrap-4.4.1.css" rel="stylesheet">
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../../../public/assets/css/jAlert.css" />
    <link rel="stylesheet" href="../../../public/assets/css/log_ticket.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

</head>

<body>

    <!-- Topbar -->

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow topbr"
        style="z-index:99999999;height:40px">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" onclick="openSide()"
            style="margin-left:-5%">
            <i class="fa fa-bars" hi></i>
        </button>
        <button id="sidebarClose" class="btn btn-link d-md-none rounded-circle mr-3" onclick="openClose()"
            style="display:none;margin-left:-5%">
            <i class="fa fa-close" hi></i>
        </button>


        <ul class="navbar-nav ml-auto" style="float:right;margin-right:-10%" id="names">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow" onclick="openProfile()">
                <a class="nav-link " id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <label style="color:blue;">
                        <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : "Unknow"; ?>
                    </label> &nbsp
                    <i class="fa fa-user-circle icons" style="font-size:20px;float:right;"></i>
                </a>
            </li>
        </ul>




    </nav>



    <!-- End of Topbar -->

    <section class="incident" onclick="closeProfile()">
        <div class="sidebar" id="sideba">

            <div class="admin">
                <center>
                    <img src="../../../public/assets/images/tekete.png" class="logo">
                </center>


                <div class="items">
                    <a class="" style="font-size:16px" href=""><i class="fa fa-envelope" aria-hidden="true"></i>Log
                        a ticket</a>
                </div>
                <!-- New -->
                <div class="items">
                    <a class="" style="font-size:16px" href="track_ticket.php"><i class="fa fa-traffic-light"
                            aria-hidden="true"></i>Track ticket</a>
                </div>


            </div>



        </div>

        <div class="sidebar5" id="side5" style="background:white;display:none">

            <div class="admin">

                <!-- These are the navigations and their icons -->
                <!-- please insert proper href links below and  for navigation -->
                <!-- New -->
                <div class="items">
                    <label class="label" href=""><i class="fa fa-envelope" aria-hidden="true"></i>
                        <?php echo $email; ?>
                    </label>
                </div>
                <div class="items">
                    <label class="label" href=""><i class="fa fa-phone" aria-hidden="true"></i>
                        <?php echo $phoneNo; ?>
                    </label>
                </div>
                <!-- New -->
                <div class="items">
                    <label class="label" href="track"><i class="fa fa-building" aria-hidden="true"></i>
                        <?php echo $company; ?>
                    </label>
                </div>

                <div class="items">
                    <a class="" style="font-size:14px;" href="../logoutest.php" /><i class="fa fa-user-circle icons"
                        aria-hidden="true"> </i>logout</a>
                </div>
                <!-- under the status the must be a dropdown with the following -->
                <!-- Use javascript for functional dropdown -->

            </div>



        </div>
        <h1 class="title">Tekete Management System</h1>

        <div class="incident-form ">

            <form class="" name="frm" id="frm" action="../Controller/logTicketController.php"  method="post" enctype="multipart/form-data">


                <table class="table">
                    <tr>
                        <td style="vertical-align:middle" class="label"> <a>Operating System:</a> </td>
                        <td>
                            <select name="os" id="operating-system" Required class='input-text'>
                                <option class="option" value=""> Select</option>
                                <option class="option" value="Windows"> Windows </option>
                                <option class="option" value="Mac"> Mac</option>
                                <option class="option" value="Android"> Android</option>
                                <option class="option" value="Linux"> Linux</option>
                            </select>
                           <span class="error">*</span>
                        </td>
                        </td>
                    </tr>
                    <tr>

                        <td style="vertical-align:middle" class="label"> <a>Department:</a></td>
                        <td> <select name="department" id="department" Required class='input-text'>

                                <option value="" class="option"> Select</option>
                                <option class="option" value="support">support</option>
                                <option class="option" value="Multimedia">Multimedia</option>
                                <option class="option" value="Development">Development</option>
                                <option class="option" value="Bussiness Analysis">Bussiness Analysis</option>
                                <option class="option" value="Project Management">Project Management</option>

                            </select><span class="error">* </span></td>
                        </td>
                    </tr>

                    <tr>

                        <td style="vertical-align:middle" class="label"> <a>Description:</a> </td>

                        <td> <select name="description" id="description" Required onchange="otherVal()"
                                class='input-text'>
                                <option value="" class="option"> Select</option>
                                <option class="option" value="forgotten password">forgotten password</option>
                                <option class="option" value="Slow performance">Slow performance</option>
                                <option class="option" value="USB unrecognised">USB unrecognised</option>
                                <option class="option" value="Computer randomly shutsdown">Computer randomly
                                    shutsdown</option>
                                <option class="option" value="Network Problem">Network Problem</option>
                                <option class="option" value="Other" id="Other">Other</option>

                            </select> <span class="error">* </span></td>
                        </td>
                    </tr>

                    <tr id="other_te" hidden>
                        <td style="vertical-align:middle" class="label"><a>Other:</a></td>
                        <td><input id="otherValue" class="input-text" type="text" name="other_text" placeholder="Other"
                                required value="" onchange="changeValue()"><span class="error">*
                            </span> </td>
                    </tr>

                    <tr>

                    <tr>
                        <td style="vertical-align:middle" class="label"><a>Attachment</a></td>
                        <td><input id="attachment" class="input-text" type="file" name="attachment" accept="image/*">
                        </td>
                    </tr>
                    <td><input class="submit_btn" type="submit" name="log" /></td>
                    <td> <input class="clear_btn" type="button" onclick="clearField()" value="Clear" name="clear">
                    </td>
            </form>

            </tr>

            </table>
        </div>  
    </section>
<script src="../../../public/assets/js/log_ticket.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>

</html>

