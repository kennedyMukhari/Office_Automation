<?php

#starts a new session
session_start();

if(!isset($_SESSION["email"])){
    header("location: ../../login.html");
}

 if($_SESSION['employeeID'] > 1){
//if(isset($_SESSION["email"]) && isset($_SESSION["f_name"]) && isset($_SESSION["l_name"])){
    $id = $_SESSION['employeeID'];
    $mail = $_SESSION['email'];
    $uname = $_SESSION['f_name'];
}



require_once("../../../engine/connection.php");
date_default_timezone_set("South Africa/Johannesburg");
$date=date('Y-m-d H:i:s');

$query = "INSERT INTO dbo.OATPosts
        (post_date,messages,title,employeeID)
        VALUES(?, ?, ?, $id)";
$params1 = array($date,$_POST[messages],$_POST[title],$id);                       
$result = sqlsrv_query($conn,$query,$params1);

//Execute the query 
if(!$result)
{
        die('Error:'.sqlsrv_errors());
}    

sqlsrv_close($conn);
header("Location: ../blog.php");

?>