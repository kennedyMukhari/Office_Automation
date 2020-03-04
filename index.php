<?php

//starts a new session
session_start();

//includes a database connection
// DATABASE CONNECTION STUFF GOES HERE
include_once("./engine/connection.php");

//catches user/password submitted by html form
$user = $_POST['email'];
$password = $_POST['passcode'];
$error_fill ="";
$error_log ="";

//checks if the html form is filled
if(empty($_POST['email']) || empty($_POST['passcode'])){
    //echo "Fill all the fields!";
    $error_fill = "Fill all the fields!";
}else{

//searches for user and password in the database
$query = "SELECT * FROM Employees WHERE email='{$user}' AND passcode='{$password}' AND status ='Approved'";
$result = sqlsrv_query($conn, $query);  //$conn is your connection in 'connection.php'


$status = "SELECT status FROM Employees";
$rst = sqlsrv_query($conn, $status);

//checks if the search was made
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}

//checks if the search brought some row and if it is one only row
if(sqlsrv_has_rows($result) != 1){
      // echo "User/password not found";
       $error_log=' <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>User/password not found or you are not approved yet!</strong> Check your credentials and try again..
            </div>';
}
else{
//creates sessions
    while($row = sqlsrv_fetch_array($result)){
       $_SESSION['email'] = $row['email'];
       $_SESSION['employeeID'] = $row['employeeID'];
       $_SESSION['f_name'] = $row['f_name'];
       $_SESSION['l_name'] = $row['l_name'];
    }
//redirects user
    //echo " you are now logged in :)";
    header("Location: /welcome.php");
}
}

?>

<!DOCTYPE html>

<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <base href="http://www.websrv.hages.co.za/" target="_blank"> -->
    <link rel="stylesheet" href="/src/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/src/css/Custom.css" />
    <script src="/src/js/bootstrap/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="/login.php">

    <title>Login</title>

</head>
<?php 
    echo $error_log; 
?>

<body class="container contain">
    <div class="inputs mt-5 mb-2" style="height: 100%;">
        <div class="logo mt-4">
            <div style="text-align:center" class="slideshow-container">
                <div class="mySlides fade">
                    <img class="logos" src="/src/img/coralite.png" style="width:50%">
                </div>

                <div class="mySlides fade">
                    <img class="logos" src="/src/img/texhnodyn.png" style="width:50%;text-align:center">
                </div>

                <div class="mySlides fade">

                    <img class="logos" src="/src/img/hages.jpg" style="width:50%">
                </div>

                <div class="mySlides fade">
                    <img class="logos" src="/src/img/tibco-spotfire.png" style="width:35%">
                </div>


                <div class="mySlides fade">
                    <img class="logos" src="/src/img/tuvlogo.jpg" style="width:50%">
                </div>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
        <div class="enter pt-3">
            <h4 style="color: black">
                <strong>Sign in to your account</strong>
            </h4>
        </div>
        <br>
        <form method="post" name="myform" onsubmit=" return validateform()" action="">
            <div class="enter">
                <label style="text-align: left;color: black">Email</label>
                <input class="input" name="email" type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" required>
            </div>
            <div class="enter">
                <label style="color: black">Password</label>
                <input class="input" name="passcode" type="password" required>
            </div>
            <!--<div class="">
                    <label style="text-align: left; float: left; color: black"><a style="color: rgb(21, 21, 20);margin-left: 5px" href="">Forgot Password?</a></label>
                </div>-->
            <div class="btn">
                <input type="submit" name="submit" class="login" value="LOG IN">
            </div>
            <div class="enter pb-4">
                <label style="color: black; float: right;">Don't have an account?&nbsp;<a style="color: rgb(21, 21, 20)" href="enrol.php"> Enroll</a></label>
            </div>
        </form>
    </div>

    <script>
        function validateform() {

            var email = document.myform.email.value;
            var passcode = document.myform.passcode.value;

            if (email == null || email == "" || email != $("#email").val()) {
                alert("Enter your email address");
                $error_log return false;
            } else if (passcode.length < 6) {
                alert("Enter your password");
                return false;
            }
        }


        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < echo "User/password not found";ts.length; i++) {
                dots[i].clasecho "User/password not found";ame = dots[i].className.replace(" active", "");
            }
            slides[slideIndeecho "User/password not found";- 1].style.display = "block";
            dots[slideIndex echo "User/password not found";1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>

</body>

</html>