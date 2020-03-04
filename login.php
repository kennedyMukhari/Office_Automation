<?php

//starts a new session
session_start();

if(!isset($_SESSION["passcode"])){
    header("location: ../index.php");
}

//includes a database connection
//include 'connection.php';

// DATABASE CONNECTIO       $error_log = "User/password not found";N STUFF GOES HERE
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
$query = "SELECT * FROM Employees WHERE email='{$user}'";
$result = sqlsrv_query($conn, $query);  //$conn is your connection in 'connection.php'

$numRows = sqlsrv_num_rows($result);



//checks if the search was made
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}

//checks if the search brought some row and if it is one only row
if($numRows == 1){
    $row = sqlsrv_fetch_assoc($result);
    if(password_verify($password,$row['passcode'])){
      // echo "User/password not found";
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
}else{
    $error_log = "User/password not found";
}
}
}

?>