
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tekete Management System </title>
    <!-- Bootstrap -->
    <!-- <link href="../css/bootstrap-4.4.1.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link href="../../../public/assets/css/login_page.css" rel="stylesheet">
    <link rel="icon" href=https://stagging.tekete.co.za/tekete.png type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!-- <link rel="stylesheet" href="../js/jAlert.css" /> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<html>
<div class="topbr">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow "
        style="z-index:9999999999;height:70px;top:0;">

        <div style="display:flex;width:100%">
            <div style="width:50%;margin-left:-1%">
                <img src="../../../public/assets/images/logo.png" class="" style="width:30%;float:left" rm
                    onclick="window.location.href='index.php'">
            </div>
            <div style="width:50%;display:flex;">
                <div style="width:100%;margin-left:4%">
                    <input class="submit_btn2" type="submit" style="width:100%" value="ADMIN"
                        onclick="window.location.href='../adminLogin'" name="">
                </div>
                <div style="width:100%;margin-left:4%">
                    <input class="submit_btn2" type="submit" value="TECH" style="width:100%"
                        onclick="window.location.href='../techLogin'" name="">
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="sidebar" id="">
    <div class="admin col-lg-11">
        <center>
            <img src="../../../public/assets/images/logo.png" class="logo" onclick="window.location.href='../'">
        </center>
        <!-- New -->
        <div class="items">
            <a class="new" style="font-size:16px" href="../register"><i class="fa fa-user-circle"
                    aria-hidden="true"></i>Register</a>
            <a class="new" style="font-size:16px" href=""><i class="fa fa-user-circle" aria-hidden="true"></i>login</a>
        </div>
    </div>
</div>

<div class="sidebar2" id="sideba">
    <div class="admin col-lg-11">
        <center>
            <img src="../../../public/assets/images/logo.png" class="logo" onclick="window.location.href='index.php'">
        </center>
        <!-- New -->
        <div class="items">
            <a class="new" style="font-size:16px" href="../register"><i class="fa fa-user-circle"
                    aria-hidden="true"></i>Register</a>
            <a class="new" style="font-size:16px" href=""><i class="fa fa-user-circle" aria-hidden="true"></i>Admin
                login</a>
        </div>
    </div>
    <div style="width:90%;margin:0 auto;display:none">
        <input class="submit_btn" type="submit" value="Admin Login" id="myButton" name="login" style="width:100%">
    </div>
</div>
<section class="incident">
    <h1 class="title">Tekete Management System</h1>
    <div class="incident-form ">

        <?php

        if (!$_SESSION['loggedIn'] = true) {
            header('Location: /login.html');
        } else {

        }

        if (!isset($_SESSION['emailAddress'])) {
            ?>
            <form id="myForm" class="" name="frm" action="../Controller/loginController.php" method="post">
                <table class="table">
                    <tr>
                        <td><label class="label" for="admin">Administrator</label>&nbsp <input type="radio" id="admin" name="status"  onclick="changeAdmin()" value="admin"> </td>
                        <td><label class="label" for="admin">Technician</label> &nbsp <input type="radio" id="technic" name="status" value="Technician" onclick="changeToEmail()" required></td>
                        <td><label class="label" for="admin">User</label> &nbsp <input type="radio" id="user" name="status"value="User"onclick="changeToEmail()"  required> </td>
                    </tr>
                    <tr>
                        <td><label class="label" id="identify" for="phone"> Email:</label></td>
                        <td><input id="phone" class="input-text" type="email" name="emailAddress"  placeholder="Email" required/></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label class="label" for="phone">Password:</label></td>
                        <td><input id="password phone" class="input-text" type="password" name="password" placeholder="Password" required></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input class="submit_btn" type="submit" value="Login" id="myButton" name="login"></td>
                        <td> <input class="clear_btn" type="submit" value="Clear" name="clear" onclick="clearField()"> </td>
                        
                    </tr>
                </table>
                <div align="center" style="font-size:18px;">
                    <a href="../forgot_userpassword/"><u>Forgot Password1</u></a>
                </div>

            </form>
            <?php
        } else {
            echo "<a href=/index.php>Go to Main Page</a>";
        }
        ?>
    </div>
</section>

<script src="../../../public/assets/js/login_page.js?v=2.6"></script>


</body>

</html>
