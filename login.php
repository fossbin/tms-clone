<?php
session_start();
require "conn/db.php";
$error = false;

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['login']))
    {   
        $adminid = $_POST['adminid'];
        $adminpswd = $_POST['adminpswd'];
    
        if($adminid != "" && $adminpswd !="")
        {
                $resultset = $db->query("Select * from tbl_admin where adminid='$adminid' ");
    
                if($resultset->num_rows)
                {
                    $row = $resultset->fetch_assoc();
                    if($row['adminpswd'] == $adminpswd)
                    {
                        $_SESSION['adminid'] = $row['adminid'];
                        $_SESSION['adminpswd'] = $row['adminpswd'];
            
                        if(isset($_SESSION['adminid']))
                        {
                            $error=false;
                            header("location: index.php");
                        }
                    }
                    else
                    {
                        $error = true;
                        $errMsg = "Incorrect username or password!<br>Please try again.";
                        // echo " 
                        // <script> alert('Incorrect username or password! Please try again.')
                        // </script> ";
                    }
                }
                else
                {
                    $error = true;
                    $errMsg = "Incorrect username or password!<br>Please try again.";
                    // echo " 
                    //     <script> alert('Incorrect username or password! Please try again.')
                    //     </script> ";
                }
        }
        else if($adminid == "" || $adminpswd == "")
        {
            $error = true;
            $errMsg = "Some fields are empty. All fields required!";
            // echo "
            // <script> alert('Some fields are empty. All fields required!')
            // </script> ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="index.html"><span>Timetable Management System</span></a>
                        </div>
                        <div class="login-form">
                            <h4>Administratior Login</h4>
                            <form>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="adminid" class="form-control" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="adminpswd" class="form-control" placeholder="Enter password">
                                </div>
                                <!--<div class="checkbox">
                                    <label>
										<input type="checkbox"> Remember Me
									</label>
                                    <label class="pull-right">
										<a href="#">Forgotten Password?</a>
									</label>
                                </div>
                                -->
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                <!--<div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button" class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                </div>
                                -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>