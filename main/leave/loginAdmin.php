<?php
require_once("../../engine/connection.php");

session_start();




#catches user/password submitted by html form
$user = $_POST['email'];
$password = $_POST['passcode'];
$EmployeeID=$_POST['EmployeeID'];

#checks if the html form is filled
if(empty($_POST['email']) || empty($_POST['passcode'])){
    echo "Fill all the fields!";
   // header("Location: login.php");
}else{

#searches for user and password in the database
$query = "SELECT * FROM Employees WHERE email='{$user}' AND passcode='{$password}'";
$result = sqlsrv_query($conn, $query);  //$conn is your connection in 'connection.php'

#checks if the search was made
if($result === false){
     die( print_r( sqlsrv_errors(), true));
}

#checks if the search brought some row and if it is one only row
if(sqlsrv_has_rows($result) != 1){
       echo "User/password not found";
}else{

#creates sessions
    while($row = sqlsrv_fetch_array($result)){
       $_SESSION['email'] = $row['email'];
       $_SESSION['employeeID'] = $row['employeeID'];
       $_SESSION['f_name'] = $row['f_name'];
       $_SESSION['l_name'] = $row['l_name'];
    }
#redirects user
    //echo " you are now logged in :)";
   include 'LeaveAdmin.php';
}
}

?>